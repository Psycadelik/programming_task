<?php

namespace App\Http\Controllers;
use App\Crop;
use Illuminate\Http\Request;

class CropsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crops = Crop::orderBy('id', 'DESC')->paginate(5);
        return view('Crop.index', compact('crops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Crop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'crop_name' => 'required',
            'crop_altitude' => 'required',
            'farming_method' => 'required',
            'harvest_time' => 'required',
        ]);

        Crop::create($request->all());
        return redirect()->route('crop.index')
                        ->with('success', 'Crop Added successfully');

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
        $crop = Crop::find($id);
        return view('Crop.edit', compact('crop'));
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
        $crop = Crop::find($id);
        return view('Crop.edit', compact('crop'));
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

        $this->validate($request, [
                'crop_name' => 'required',
                'crop_altitude' => 'required',
                'farming_method' => 'required',
                'harvest_time' => 'required',
        ]);

        Crop::find($id)->update($request->all());
        return redirect()->route('crop.index')
                        ->with('success', 'Crop updated successfully');
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
        Crop::find($id)->delete();
        return redirect()->route('crop.index')
                        ->with('success', 'Crop deleted successfully');
    }
}
