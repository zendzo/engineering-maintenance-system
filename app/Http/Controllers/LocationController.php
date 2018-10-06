<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Location;

class LocationController extends Controller
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
            'location' => 'required|string|max:255',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('message', $validator->errors()->__toString())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
        
        try {
            
            $create =  Location::create([
                'name' => $request['location']
            ]);
            
            if ($create) {
                return redirect()->back()->with('message', 'New Location Saved!')
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'location' => 'required|string|max:255',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('message', $validator->errors()->__toString())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
        
        try {
            $create =  Location::findorFail($id)->update([
                'name' => $request['location']
            ]);
            
            if ($create) {
                return redirect()->back()->with('message', 'Location Data Updated!')
                    ->with('status','Successfully Save Edited Data !')
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        try {
            $delete = $location->delete();
            if ($delete) {
                return redirect()->back()->with('message', 'Location Data Deleted!')
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
