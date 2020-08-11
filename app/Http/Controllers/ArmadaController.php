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

        // set default order value
        $orderBy = $request->orderBy ? $request->orderBy : 'created_at';
        $orderType = $request->orderType ? $request->orderType : 'DESC';

        $cars = Car::all();

        if ($request->has('search_query')) {
            $armadas = Armada::join('cars', 'armadas.car_id', '=', 'cars.id')
            ->select('armadas.*', \DB::raw('CONCAT_WS(" ", brand, name) as name'))
            ->where(\DB::raw('CONCAT_WS(" ", brand, name)'), 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('license_plate', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('status', 'LIKE', '%'.$request->search_query.'%')
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        } else {
            $armadas = Armada::join('cars', 'armadas.car_id', '=', 'cars.id')
            ->select('armadas.*', \DB::raw('CONCAT(brand," ",name) as name'))
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        }

        $armadas->appends([
            'search_query' => $request->search_query
        ]);

        // append order query
        if ($orderBy != 'created_at') {
            $armadas->appends([
                'orderBy'   => $orderBy,
                'orderType' => $orderType
            ]);
        }

        return view('armada.index')->with([
            'armadas'   => $armadas,
            'cars'      => $cars,
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

        Alert::success('Berhasil', 'Data telah ditambahkan!');
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

        Alert::success('Berhasil', 'Data telah diperbarui!');
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

        Alert::success('Berhasil', 'Data telah dihapus!');
        return redirect()->back();
    }
}
