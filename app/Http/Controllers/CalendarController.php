<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\MaintenanceEvent;
use Carbon\Carbon;
use App\Asset;

class CalendarController extends Controller
{
    protected $schedule;

    public function __construct(MaintenanceEvent $schedule)
    {
        $this->schedule = $schedule;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->schedule->all();

        $calendar = Calendar::addEvents($events);

        $assets = Asset::select(['id','property'])->get();

        return view('calendar.index', compact(['calendar','events','assets']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->createMaintenanceSchedule($request);
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
        try {
            $delete = $this->schedule->findOrFail($id)->delete();
            if ($delete) {
                return redirect()->back()->with('message', 'Maintenance Schedule Data Deleted!')
                    ->with('status','Successfully Delete Data !')
                    ->with('type','success');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('message', $e->getMessage())
                    ->with('status','Failed to delete Data !')
                    ->with('type','error');
        }
    }

    public function createMaintenanceSchedule($request)
    {
        $start_date = Carbon::createFromFormat('m/d/Y', substr($request->get('start'), 0, 10));
        $end_date = Carbon::createFromFormat('m/d/Y', substr($request->get('start'), 13, 10));

        try {

            $data = $this->schedule->create([
                'title' => $request->get('title'),
                'asset_id' => $request->get('asset_id'),
                'all_day' => $request->get('all_day'),
                'start' => $start_date,
                'end' => $end_date,
                'background_color' => $request->get('background_color')
            ]);

            if ($data) {
                return redirect()->back()->with('message', 'Maintenance Schedule Created!')
                    ->with('status','Data Successfully Saved!')
                    ->with('type','success');
            }

            }catch (\Exception $e){
                return redirect()->back()->with('message', $e->getMessage())
                        ->with('status','Failed to Save Data!')
                        ->with('type','error');
            }
    }
}
