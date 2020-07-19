<?php

namespace App\Http\Controllers;

use Alert;
use App\Rent;
use App\Car;
use App\Driver;
use App\Armada;
use App\Customer;
use App\Payment;
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
            $rents = Rent::join('customers', 'rents.id_customer', '=', 'customers.id')
            ->join('cars', 'rents.id_mobil', '=', 'cars.id')
            ->select('rents.*', 'customers.nama', \DB::raw('CONCAT(merk_mobil," ",nama_mobil) as nama_mobil'))
            ->where('status', $status)
            ->where(function($q) use ($request) {
                $q->where('nama', 'LIKE', '%'.$request->search_query.'%');
                $q->orWhere(\DB::raw('CONCAT(merk_mobil," ",nama_mobil)'), 'LIKE', '%'.$request->search_query.'%');
            })
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        } else {
            $rents = Rent::join('customers', 'rents.id_customer', '=', 'customers.id')
            ->join('cars', 'rents.id_mobil', '=', 'cars.id')
            ->select('rents.*', 'customers.nama', \DB::raw('CONCAT(merk_mobil," ",nama_mobil) as nama_mobil'))
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
    public function create_rent_admin() {
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
    public function store_rent_admin(Request $request) {
        $cars = Car::where('id', $request->id_mobil)->first();
        $tipe_harga = ($request->tipe_peminjaman == 3 ? 200000 : ($request->tipe_peminjaman == 2 ? 100000 : 0));
        $harga = (intval($cars->harga) + $tipe_harga) * intval($request->lama_sewa);
        $habis_sewa = Carbon::parse($request->mulai_sewa)->addDay($request->lama_sewa);

        if ($request->create == "1") {
            $rent = new Rent;
            $rent->id_customer = $request->id_customer;
            $rent->id_mobil = $request->id_mobil;
            $rent->tipe_peminjaman = $request->tipe_peminjaman;
            $rent->mulai_sewa = $request->mulai_sewa;
            $rent->lama_sewa = $request->lama_sewa;
            $rent->habis_sewa = $habis_sewa;
            $rent->lokasi_penjemputan = $request->lokasi_penjemputan;
            $rent->status = 'pending';
            $rent->save();

            Alert::success('Berhasil', 'Pesanan telah dibuat');
            return redirect()->route('pending_index');
        }

        // cek harga dengan mengembalikan nilai harga
        return back()->withInput()->with('harga', $harga);
    }
    
    /**
     * 
     * MENGEMBALIKAN MOBIL
     * 
     */
    public function rent_update(Request $request) {
        $rent = Rent::find($request->id);
        $rent->status = 'kembali';
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
    public function pending_show(Request $request) {
        $drivers    = Driver::where('driver_status', 'tersedia')->get();
        $rent       = Rent::where('id', $request->id)->first();
        $armadas    = Armada::where(['status' => 'tersedia', 'id_mobil' => $rent->id_mobil])->get();

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
    public function pending_update(Request $request) {

        // Menambahkan driver & armada
        $rent = Rent::find($request->id);
        $rent->id_driver = $request->id_driver;
        $rent->id_armada = $request->id_armada;
        $rent->status = 'jalan';
        $rent->save();

        // Update armada mobil status
        $armada = Armada::find($request->id_armada);
        $armada->status = 'jalan';
        $armada->save();

        // Update driver status
        if ($request->has("id_driver")) {
            $driver = Driver::find($request->id_driver);
            $driver->driver_status = 'jalan';
            $driver->save();
        }

        Alert::success('Berhasil', 'Pesanan telah dikonfirmasi');
        return redirect()->route("rent_index");
    }

}