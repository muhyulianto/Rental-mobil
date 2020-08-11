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
    public function index(Request $request)
    {
        // set default order value
        $orderBy = $request->orderBy ? $request->orderBy : 'created_at';
        $orderType = $request->orderType ? $request->orderType : 'DESC';

        if ($request->has('search_query')) {
            $drivers = Driver::where('name', 'LIKE', '%' . $request->search_query . '%')
                ->orWhere('age', 'LIKE', '%' . $request->search_query . '%')
                ->orWhere('address', 'LIKE', '%' . $request->search_query . '%')
                ->orWhere('status', 'LIKE', '%' . $request->search_query . '%')
                ->orderBy($orderBy, $orderType)
                ->paginate(10);
        } else {
            $drivers = Driver::orderBy($orderBy, $orderType)
                ->paginate(10);
        }

        $drivers->appends([
            'search_query' => $request->search_query
        ]);

        // append order query
        if ($orderBy != 'created_at') {
            $drivers->appends([
                'orderBy'   => $orderBy,
                'orderType' => $orderType
            ]);
        }

        return view('driver.index')->with([
            'drivers'   => $drivers,
            'orderType' => $orderType == 'DESC' ? 'ASC' : 'DESC'
        ]);
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
        $driver = new Driver;
        $driver->name = $request->name;
        $driver->age = $request->age;
        $driver->address = $request->address;
        $driver->phone_number = $request->phone_number;
        $driver->save();

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
        $driver = Driver::find($driver->id);
        $driver->name = $request->name;
        $driver->age = $request->age;
        $driver->address = $request->address;
        $driver->phone_number = $request->phone_number;
        $driver->save();

        Alert::success('Berhasil', 'Data telah diupdate');
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

        Alert::success('Berhasil', 'Data telah dihapus');
        return redirect()->back();
    }
}
