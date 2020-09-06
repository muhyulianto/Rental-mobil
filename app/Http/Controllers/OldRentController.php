<?php

namespace App\Http\Controllers;

use Alert;
use App\Rent;
use App\Car;
use App\Driver;
use App\Armada;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * 
     * MENAMPILKAN DATA PENYEWAAN MOBIL
     *
     */
    public function index()
    {
        return view("rent.index");
    }

    /**
     * 
     * FORM PEMBUATAN PENYEWAAN BARU DARI ROLE ADMIN
     *
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
     * 
     * MEMBUAT PENYEWAAN DARI ROLE ADMIN
     *
     */
    public function store(Request $request)
    {
        $cars = Car::where('id', $request->car_id)->first();
        $tipe_price = ($request->services_type == 3 ? 200000 : ($request->services_type == 2 ? 100000 : 0));
        $price = (intval($cars->price) + $tipe_price) * intval($request->duration);
        $end_date = Carbon::parse($request->start_date)->addDay($request->duration);

        if ($request->create == "1") {
            $rent = new Rent;
            $rent->customer_id = $request->customer_id;
            $rent->car_id = $request->car_id;
            $rent->services_type = $request->services_type;
            $rent->start_date = $request->start_date;
            $rent->duration = $request->duration;
            $rent->end_date = $end_date;
            $rent->pickup_location = $request->pickup_location;
            $rent->status = 'pending';
            $rent->save();

            Alert::success('Berhasil', 'Pesanan telah dibuat');
            return redirect()->route('rent.index');
        }

        // cek price dengan mengembalikan nilai price
        return back()->withInput()->with('price', $price);
    }

    /**
     * 
     * MENGEMBALIKAN MOBIL
     * 
     */
    public function updateOnloan(Request $request)
    {
        $rent = Rent::find($request->id);
        $rent->status = 'completed';
        $rent->save();

        Alert::success('Berhasil', 'Mobil telah dikembalikan!');
        return redirect()->route('rents.index');
    }

    /**
     * 
     * MENAMPILKAN DATA LENGKAP TENTANG MOBIL DALAM PEMINJAMAN
     *
     */
    public function showOnloan($id)
    {
        $rent = Rent::with('customers', 'cars', 'drivers', 'armadas')
            ->find($id);

        return view('rent.show')->with('rent', $rent);
    }

    /**
     * 
     * MENGHAPUS DATA PEMINJAMAN
     *
     */
    public function destroy($id)
    {
        Rent::find($id)->delete();

        Alert::success('Berhasil', 'Data telah dihapus');
        return redirect()->back();
    }

    /**
     * 
     * MENAMPILKAN INFORMASI DETAIL SEWA YANG BELUM DIKONFIRMASI
     *
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
     * 
     * MENGKONFIRMASI PENYEWAAN
     *
     */
    public function updatePending(Request $request)
    {
        // Menambahkan driver & armada
        $rent = Rent::find($request->id);
        $rent->driver_id = $request->driver_id;
        $rent->id_armada = $request->id_armada;
        $rent->status = 'onloan';
        $rent->save();

        // Update armada mobil status
        $armada = Armada::find($request->id_armada);
        $armada->status = 'unavailable';
        $armada->save();

        // Update driver status
        if ($request->has("driver_id")) {
            $driver = Driver::find($request->driver_id);
            $driver->status = 'unavailable';
            $driver->save();
        }

        Alert::success('Berhasil', 'Pesanan telah dikonfirmasi');
        return redirect()->route("rents.index");
    }
}
