<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkOrder;

class ReportController extends Controller
{
    protected $workorder;

    public function __construct(WorkOrder $workorder)
    {
        $this->workorder = $workorder;
    }
    public function showReportType($type)
    {
        switch ($type) {
            case 'job':
                $workorders = $this->workorder->all();
                break;
            case 'location':
                $workorders = $this->workorder->all();
                break;
            case 'engineer':
                $workorders = $this->workorder->all();
                break;
            default:
                $workorders = $this->workorder->all();
                break;
        }
        return view('workorder.index', compact('workorders'));
    }
}
