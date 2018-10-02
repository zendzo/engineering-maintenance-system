<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use Carbon\Carbon;

class AssetController extends Controller
{

    protected $asset;

    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = $this->asset->all();

        return view('asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->createNewAsset($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function createNewAsset($request)
    {
        $purcashed_at = Carbon::createFromFormat('m/d/Y', $request->get('purcashed_at'));
        try {
            $asset = $this->asset->create([
                'category_id' => $request->get('category_id'),
                'location_id' => $request->get('location_id'),
                'property' => $request->get('property'),
                'merk' => $request->get('merk'),
                'model' => $request->get('model'),
                'serial_number' => $request->get('serial_number'),
                'capacity' => $request->get('capacity'),
                'purcashed_at' => $purcashed_at,
                'supplier_id' => $request->get('supplier_id'),
                'description' => $request->get('description')
            ]);

            if ($request->hasFile('photo')) {
                $asset->addMediaFromRequest('photo')->toMediaCollection('images');
            }

            if ($asset) {
                return redirect()->back()->with('message', 'Asset Data Created!')
                    ->with('status','Data Successfully Saved!')
                    ->with('type','success');
            }

        }catch(\Exception $e){
            return redirect()->back()->with('message', $e->getMessage())
                        ->with('status','Failed to Save Data!')
                        ->with('type','error');
        }
    }
}
