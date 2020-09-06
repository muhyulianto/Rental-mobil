<?php

namespace App\Http\Controllers;

use Alert;
use App\driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('driver.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Driver::create($request->all());

        Alert::success('Success!', 'Data has been added');
        return redirect()->route("driver.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(driver $driver)
    {
        $driver = Driver::find($driver->id);
        return view("driver.edit")->with('driver', $driver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, driver $driver)
    {
        $driver = Driver::findOrFail($driver->id);
        $driver->name = $request->name;
        $driver->age = $request->age;
        $driver->address = $request->address;
        $driver->phone_number = $request->phone_number;
        $driver->save();

        Alert::success('Success!', 'Data has been updated');
        return redirect()->route("driver.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(driver $driver)
    {
        Driver::find($driver->id)->delete();

        Alert::success('Success!', 'Data has been deleted');
        return redirect()->back();
    }
}
