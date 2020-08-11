<?php

namespace App\Http\Controllers;

use Alert;
use Auth;
use Notification;
use App\User;
use App\Car;
use App\Rent;
use App\Invoice;
use App\Customer;
use App\Notifications\KonfirmasiPembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeminjamanUserController extends Controller
{
    public function index()
    {
        $user = User::with('customers')->find(Auth::user()->id);

        if (!empty($user->customers)) {
            $rents = Rent::where('customer_id', $user->customers->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $rents = [];
        }

        return view('user.index')->with([
            'rents' => $rents
        ]);
    }

    public function bayar($id)
    {
        $invoice = Invoice::find($id);
        return view('user.bayar')->with('Invoice', $invoice);
    }

    public function konfirmasi(Request $request, $id)
    {
        if ($request->hasFile("bukti")) {
            $nama_gambar = time() . '.' . $request->file('bukti')->getClientOriginalExtension();
            Storage::putFileAs("public/bukti", $request->file('bukti'), $nama_gambar);
        }

        $invoice = Invoice::find($id);
        $invoice->payment_proof = $nama_gambar;
        $invoice->save();

        $admin = User::where('is_admin', 1)->first();
        Notification::send($admin, new KonfirmasiPembayaran($invoice));

        Alert::success('Berhasil', 'Mohon tunggu sampai admin mengkonfirmasi');
        return redirect()->route('rentUser.index');
    }

    public function create_rent($id)
    {
        $user = User::with('customers')->find(Auth::user()->id);
        $cars = Car::find($id);

        return view('user.rent')->with([
            'user'      => $user,
            'cars'      => $cars
        ]);
    }

    public function show($id)
    {
        $rent = Rent::find($id);

        return view('user.rentDetail')->with([
            'rent'  => $rent
        ]);
    }

    /**
     * 
     * MEMBUAT PEMESANAN DARI ROLE USER
     *
     */
    public function store_rent(Request $request)
    {
        $cars = Car::where('id', $request->car_id)->first();
        $tipe_price = ($request->services_type == 3 ? 200000 : ($request->services_type == 2 ? 100000 : 0));
        $price = (intval($cars->price) + $tipe_price) * intval($request->duration);
        $end_date = Carbon::parse($request->start_date)->addDay($request->duration);

        // BUAT PESANAN
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

            Alert::success('Berhasil', 'Pesanan anda telah ditambahkan');
            return redirect()->route('rentUser.index');
        }

        // cek price dengan mengembalikan nilai price
        return back()->withInput()->with('price', $price);
    }
}
