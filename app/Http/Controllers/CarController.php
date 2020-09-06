<?php

namespace App\Http\Controllers;

use Alert;
use App\Car;
use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * __construct
     *
     * @param  mixed $carService
     * @return void
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('car.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = Car::create($request->all());
        $this->carService->handleUploadImage($request->file('image'), $car);

        Alert::success('Berhasil', 'Data telah ditambahkan!');
        return redirect()->route("car.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $car = Car::find($car->id);
        return view('car/show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $car = Car::find($car->id);
        return view('car/edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $car = Car::find($car->id);
        $car->update($request->all());
        $this->carService->handleUploadImage($request->file('image'), $car);

        Alert::success('Berhasil', 'Data telah diubah!');
        return redirect()->route("car.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        Car::find($car->id)->delete();
        Alert::success('Berhasil', 'Data telah dihapus!');
        return redirect()->back();
    }
}
