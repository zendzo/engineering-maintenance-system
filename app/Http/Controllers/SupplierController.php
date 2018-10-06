<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
            'address' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('message', $validator->errors()->__toString())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
        
        try {
            
            $create =  Supplier::create([
                'name' => $request['name'],
                'address' => $request['address'],
                'phone' => $request['phone'],
            ]);
            
            if ($create) {
                return redirect()->back()->with('message', 'New Supplier Data added!')
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
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('message', $validator->errors()->__toString())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
        
        try {
            
            $create =  $supplier->update([
                'name' => $request['name'],
                'address' => $request['address'],
                'phone' => $request['phone'],
            ]);
            
            if ($create) {
                return redirect()->back()->with('message', 'Supplier Data Updated!')
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
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        try {
            $delete = $supplier->delete();
            if ($delete) {
                return redirect()->back()->with('message', 'Supplier Data Deleted!')
                    ->with('status','Successfully Delete Data !')
                    ->with('type','success');
            }
        } catch(\Exception $e){
            return redirect()->back()->with('message', $e->getMessage())
                    ->with('status','Failed to delete Data !')
                    ->with('type','error');
        }
    }
}
