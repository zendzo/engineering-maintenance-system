<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use App\WorkOrder;

class WorkOrderController extends Controller
{
    public function index()
    {
        return Laratables::recordsOf(WorkOrder::class);
    }
}
