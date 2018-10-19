<?php

namespace App\Observers;

use App\WorkOrder;
use Carbon\Carbon;

class WorkOrderObserver
{
    /**
     * Handle the work order "created" event.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return void
     */
    public function created(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Handle the work order "updated" event.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return void
     */
    public function updated(WorkOrder $workOrder)
    {
        if($workOrder->status === 3){
            $workOrder->finish_at = Carbon::now();
        }
    }

    /**
     * Handle the work order "deleted" event.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return void
     */
    public function deleted(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Handle the work order "restored" event.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return void
     */
    public function restored(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Handle the work order "force deleted" event.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return void
     */
    public function forceDeleted(WorkOrder $workOrder)
    {
        //
    }
}
