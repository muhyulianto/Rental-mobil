<?php

namespace App\Http\Controllers;

use Alert;
use App\Rent;
use App\Car;
use App\Driver;
use App\Armada;
use App\Customer;
use App\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * 
     * MENAMPILKAN DATA PENYEWAAN MOBIL
     *
     */
    public function index(Request $request)
    {

        // set default order value
        $orderBy = $request->orderBy ? $request->orderBy : 'updated_at';
        $orderType = $request->orderType ? $request->orderType : 'DESC';

        $status = request()->segment(count(request()->segments()));

        if ($request->has('search_query')) {
            $rents = Rent::join('customers', 'rents.customer_id', '=', 'customers.id')
                ->join('cars', 'rents.car_id', '=', 'cars.id')
                ->select('rents.*', 'customers.name', \DB::raw('CONCAT(brand," ",name) as name'))
                ->where('status', $status)
                ->where(function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->search_query . '%');
                    $q->orWhere(\DB::raw('CONCAT(brand," ",name)'), 'LIKE', '%' . $request->search_query . '%');
                })
                ->orderBy($orderBy, $orderType)
                ->paginate(10);
        } else {
            $rents = Rent::join('customers', 'rents.customer_id', '=', 'customers.id')
                ->join('cars', 'rents.car_id', '=', 'cars.id')
                ->select('rents.*', 'customers.name', \DB::raw('CONCAT(cars.brand," ",cars.name) as name'))
                ->where('status', $status)
                ->orderBy($orderBy, $orderType)
                ->paginate(10);
        }

        // append order query
        if ($orderBy != 'updated_at') {
            $rents->appends([
                'orderBy'   => $orderBy,
                'orderType' => $orderType
            ]);
        }

        return view('rent.index')->with([
            'rents'     => $rents,
            'orderType' => $orderType == 'DESC' ? 'ASC' : 'DESC'
        ]);
    }

    /**
     * 
     * FORM PEMBUATAN PENYEWAAN BARU DARI ROLE ADMIN
     *
     */
    public function create_rent_admin()
    {
        $customers = Customer::all();
        $cars = Car::all();

        return view('rent.create')->with([
            'customers'     => $customers,
            'cars'      => $cars,
        ]);
    }

    /**
     * 
     * MEMBUAT PENYEWAAN DARI ROLE ADMIN
     *
     */
    public function store_rent_admin(Request $request)
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
            return redirect()->route('pending_index');
        }

        // cek price dengan mengembalikan nilai price
        return back()->withInput()->with('price', $price);
    }

    /**
     * 
     * MENGEMBALIKAN MOBIL
     * 
     */
    public function rent_update(Request $request)
    {
        $rent = Rent::find($request->id);
        $rent->status = 'completed';
        $rent->save();

        Alert::success('Berhasil', 'Mobil telah dikembalikan!');
        return redirect()->route('return_index');
    }

    /**
     * 
     * MENAMPILKAN DATA LENGKAP TENTANG MOBIL DALAM PEMINJAMAN
     *
     */
    public function rent_show($id)
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
    public function pending_destroy($id)
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
    public function pending_show(Request $request)
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
    public function pending_update(Request $request)
    {

        // Menambahkan driver & armada
        $rent = Rent::find($request->id);
        $rent->driver_id = $request->driver_id;
        $rent->id_armada = $request->id_armada;
        $rent->status = 'onloan';
        $rent->save();

        // Update armada mobil status
        $armada = Armada::find($request->id_armada);
        $armada->status = 'onloan';
        $armada->save();

        // Update driver status
        if ($request->has("driver_id")) {
            $driver = Driver::find($request->driver_id);
            $driver->status = 'onloan';
            $driver->save();
        }

        Alert::success('Berhasil', 'Pesanan telah dikonfirmasi');
        return redirect()->route("rent_index");
    }
}
