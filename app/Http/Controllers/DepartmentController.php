<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('message', $validator->errors()->__toString())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
        
        try {
            
            $create =  Department::create([
                'name' => $request['name']
            ]);
            
            if ($create) {
                return redirect()->back()->with('message', 'New Department Added!')
                    ->with('status','Successfully Save Entry Data !')
                    ->with('type','success');
            }
        }catch (\Exception $e){
            return redirect()->back()->with('message', $e->getMessage())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('message', $validator->errors()->__toString())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
        
        try {
            
            $create =  $department->update([
                'name' => $request['name']
            ]);
            
            if ($create) {
                return redirect()->back()->with('message', 'Department Data Updated!')
                    ->with('status','Successfully Save Entry Data !')
                    ->with('type','success');
            }
        }catch (\Exception $e){
            return redirect()->back()->with('message', $e->getMessage())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        try{
            $delete = $department->delete();
            if ($delete) {
                return redirect()->back()->with('message', 'Department Data Deleted!')
                    ->with('status','Successfully Delete Data !')
                    ->with('type','success');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('message', $e->getMessage())
                    ->with('status','Failed to delete Data !')
                    ->with('type','error');
        }
    }
}
