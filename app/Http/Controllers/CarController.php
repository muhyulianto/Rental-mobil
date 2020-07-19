<?php

namespace App\Http\Controllers;

use Alert;
use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
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
            $cars = Car::withCount('armadas')
            ->where('jenis_mobil', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('nama_mobil', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere(\DB::raw('CONCAT(merk_mobil," ",nama_mobil)'), 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('merk_mobil', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('harga', 'LIKE', '%'.$request->search_query.'%')
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        } else {
            $cars = Car::withCount('armadas')
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        }

        // append order query
        if ($orderBy != 'created_at') {
            $cars->appends([
                'orderBy'   => $orderBy,
                'orderType' => $orderType
            ]);
        }

        return view('car.index')->with([
            'cars' => $cars,
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
        if ($request->hasFile("gambar")) {
            $image_name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs("public/images", $request->file('gambar'), $image_name);
        } else {
            $image_name = 'default.jpg';
        }

        $car = new Car;
        $car->jenis_mobil = $request->jenis_mobil;
        $car->nama_mobil = $request->nama_mobil;
        $car->merk_mobil = $request->merk_mobil;
        $car->bahan_bakar = $request->bahan_bakar;
        $car->harga = $request->harga;
        $car->gambar = $image_name;
        $car->save();

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
        $file = $request->file('gambar');
        
        if ($request->hasFile("gambar")) {
            $image_name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs("public/images", $file, $image_name);
        } else {
            $image_name = $car->gambar;
        }

        $car->jenis_mobil = $request->jenis_mobil;
        $car->nama_mobil = $request->nama_mobil;
        $car->merk_mobil = $request->merk_mobil;
        $car->bahan_bakar = $request->bahan_bakar;
        $car->harga = $request->harga;
        $car->gambar = $image_name;
        $car->save();

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
