<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
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
            'category' => 'required|string|max:255',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('message', $validator->errors()->__toString())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
        
        try {
            $create =  Category::create([
                'name' => $request['category']
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('message', $validator->errors()->__toString())
                    ->with('status','Failed to Save Entry Data !')
                    ->with('type','error');
        }
        
        try {
            $update =  $category->update([
                'name' => $request['category']
            ]);
            
            if ($update) {
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
