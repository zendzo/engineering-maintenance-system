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
        $workorders = $this->workorder->all();

        return view('workorder.index', compact('workorders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
                $workorders = $this->workorder->where('created_at','>=',Carbon::today())->get();
                // return view('workorder.index', compact('workorders'));
                break;
            case 'progress':
                $workorders = $this->workorder->where('status',1)->get();
                // return view('workorder.index', compact('workorders'));
                break;
            case 'pending':
                $workorders = $this->workorder->where('status',2)->get();
                // return view('workorder.index', compact('workorders'));
                break;
            case 'done':
                $workorders = $this->workorder->where('status',3)->get();
                break;;
        }
        return view('workorder.index', compact('workorders'));
    }
}
