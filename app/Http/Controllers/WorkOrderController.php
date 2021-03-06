<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\WorkOrder;

class WorkOrderController extends Controller
{

    protected $workorder;

    public function __construct(WorkOrder $workorder)
    {
        $this->workorder = $workorder;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workorders = $this->workorder->select('*')->orderBy('id','DESC')->get();

        return view('workorder.index', compact(['workorders']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->createWorkOrder($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
        return $this->showWorkOrderBy($status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       return $this->updateWorkOrder($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Dsiplay list of workorder by status
     * 0 = new
     * 1 = on progress
     * 2 = pending
     * 3 = done
     *
     * @return Illuminate\Http\Response
     */
    public function showWorkOrderBy($status)
    {
        switch ($status) {
            case 'today':
                $workorders = $this->workorder->where('created_at','>=',Carbon::today())->orderBy('id','DESC')->get();
                break;
            case 'progress':
                $workorders = $this->workorder->where('status',1)->orderBy('id','DESC')->get();
                break;
            case 'pending':
                $workorders = $this->workorder->where('status',2)->orderBy('id','DESC')->get();
                break;
            case 'done':
                $workorders = $this->workorder->where('status',3)->orderBy('id','DESC')->get();
                break;;
        }
        return view('workorder.index', compact('workorders'));
    }

    public function createWorkOrder(Request $request)
    {
        if(is_null($request['status'])){
            $request['status'] = 0;
        }
        try{
            $createWO = $this->workorder->create([
                'priority' => $request->get('priority'),
                'location_id' => $request->get('location'),
                'category_id' => $request->get('category'),
                'job' => $request->get('job'),
                'order_by' => auth()->id(),
                'follow_up' => $request->get('follow_up'),
                'department_id' => $request->get('department'),
                'status' => $request['status']
            ]);

           if ($request->hasFile('photo')) {
                $createWO->addMediaFromRequest('photo')->toMediaCollection('images');
           }

            return redirect()->back()
                    ->with('message', 'Work Order Saved!')
                    ->with('status','Data Successfully Saved!')
                    ->with('type','success');

        }catch(\Exception $e){
            return redirect()->back()
                    ->with('message', $e->getMessage())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
    }

    public function updateWorkOrder($request, $id)
    {
        try {
            $workOrder = $this->workorder->findOrFail($id);
            $update = $workOrder->update([
            'priority' => $request->get('priority'),
            'location_id' => $request->get('location'),
            'category_id' => $request->get('category'),
            'job' => $request->get('job'),
            'follow_up' => $request->get('follow_up'),
            'department_id' => $request->get('department'),
            'status' => $request->get('status')
        ]);

        if ($request->hasFile('photo')) {
            $workOrder->clearMediaCollection('images');
            $workOrder->addMediaFromRequest('photo')->toMediaCollection('images');
        }

        if ($update) {
            return redirect()->back()
                ->with('message', 'Work Order Updated!')
                ->with('status','Data Successfully Updated!')
                ->with('type','success');
        }

       }catch(\Exception $e){
        return redirect()->back()
            ->with('message', $e->getMessage())
            ->with('status','Failed to Update Entry Data !');
       }
    }

    /**
     * updateStatus
     *
     * @param  mixed $request
     * @param  mixed $workorder
     *
     * @return void
     */
    public function updateStatus(Request $request, $id)
    {
        if($request['status'] === 3){
            $request['finish_at'] = Carbon::now();
        }
        try{
            
            $this->workorder->findOrFail($id)->update([
                'status' => $request->get('status'),
                'finish_at' => $request->get('status') === 3 ? Carbon::now() : null
                ]);

            return redirect()->back()
                ->with('message', 'Work Order Updated!')
                ->with('status','Data Successfully updated!')
                ->with('type','success');
        }catch(\Exception $e){
            return redirect()->back()
            ->with('message', $e->getMessage())
            ->with('status','Failed to Update Entry Data !');
        }
    }
}
