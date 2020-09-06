<?php

namespace App\Http\Controllers;

use Alert;
use App\Armada;
use App\Car;
use App\Customer;
use App\Driver;
use App\Rent;
use App\Services\RentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function __construct(RentService $rentService)
    {
        $this->rentService = $rentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("rent.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $cars = Car::all();

        return view('rent.create')->with([
            'customers'     => $customers,
            'cars'          => $cars,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rent = Rent::create($request->all());
        $rent->end_date = Carbon::parse($request['start_date'])->addDays($request['duration']);
        $rent->save();

        Alert::success('Berhasil', 'Pesanan telah dibuat');
        return redirect()->route('rents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('rent.show');
    }

    /**
     * Display pending resource
     *
     * @param  mixed $request
     * @return void
     */
    public function showPending(Request $request)
    {
        $drivers    = Driver::where('status', 'available')->get();
        $rent       = Rent::where('id', $request->id)->first();
        $armadas    = Armada::where(['status' => 'available', 'car_id' => $rent->car_id])->get();

        return view("rent.confirm")->with([
            'drivers'   => $drivers,
            'armadas'   => $armadas,
            'rent'      => $rent
        ]);
    }

    /**
     * Display resource onloan
     *
     * @param  mixed $id
     * @return void
     */
    public function showOnloan($id)
    {
        $rent = Rent::with('customers', 'cars', 'drivers', 'armadas')
            ->find($id);

        return view('rent.show')->with('rent', $rent);
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
        Rent::find($id)->delete();

        Alert::success('Berhasil', 'Data telah dihapus');
        return redirect()->back();
    }
}
