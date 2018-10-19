<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\WorkOrder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // redirect to admin page is user is administrator
        if (Auth::user()->role_id === 1) {
            return redirect('/admin');
        }

        if (Auth::user()->role_id === 2 || Auth::user()->role_id === 3) {
            
            $workorders = WorkOrder::where('order_by',Auth::id())->where('status','!=','3')->orderBy('updated_at','DESC')->get();

            return view('home',compact(['workorders']));
        }
        
        $workorders = WorkOrder::where('follow_up',Auth::id())->where('status','!=','3')->orderBy('updated_at','DESC')->get();

        return view('home',compact(['workorders']));
    }

    public function jobDone()
    {
        if (Auth::user()->role_id === 2 || Auth::user()->role_id === 3) {
            
            $workorders = WorkOrder::where('order_by',Auth::id())->where('status','=','3')->orderBy('updated_at','DESC')->get();

            return view('home',compact(['workorders']));
        }
        
        $workorders = WorkOrder::where('follow_up',Auth::id())->where('status','=','3')->orderBy('updated_at','DESC')->get();

        return view('home',compact(['workorders']));
    }
}
