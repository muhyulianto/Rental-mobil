<?php

namespace App\Http\Controllers;

use Alert;
use App\Armada;
use App\Car;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cars = Car::all();
        return view('armada.index')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // using modal
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Armada::Create($request->all());

        Alert::success('Success!', 'Data has been added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function show(Armada $armada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function edit(Armada $armada)
    {
        $armada = Armada::find($armada->id);

        return view('armada.edit')->with([
            'armada'   => $armada
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Armada $armada)
    {
        $armada = Armada::find($armada->id);
        $armada->license_plate = $request->license_plate;
        $armada->save();

        Alert::success('Success!', 'Data has been updated');
        return redirect()->route('armada.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Armada $armada)
    {
        Armada::find($armada->id)->delete();

        Alert::success('Success!', 'Data has been deleted');
        return redirect()->back();
    }
}
