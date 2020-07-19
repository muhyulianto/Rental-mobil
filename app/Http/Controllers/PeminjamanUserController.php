<?php

namespace App\Http\Controllers;

use Alert;
use Auth;
use Notification;
use App\User;
use App\Car;
use App\Rent;
use App\Payment;
use App\Customer;
use App\Notifications\KonfirmasiPembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeminjamanUserController extends Controller
{
    public function index() {
        $user = User::with('customers')->find(Auth::user()->id);

        if (!empty($user->customers)) {
            $rents = Rent::where('id_customer', $user->customers->id)
            ->orderBy('created_at', 'desc')
            ->get();
        } else {
            $rents = [];
        }

        return view('user.index')->with([
            'rents' => $rents
        ]);
    }

    public function bayar($id) {
        $payment = Payment::find($id);
        return view('user.bayar')->with('payment', $payment);
    }

    public function konfirmasi(Request $request, $id) {
        if ($request->hasFile("bukti")) {
            $nama_gambar = time().'.'.$request->file('bukti')->getClientOriginalExtension();
            Storage::putFileAs("public/bukti", $request->file('bukti'), $nama_gambar);
        } 

        $payment = Payment::find($id);
        $payment->bukti_pembayaran = $nama_gambar;
        $payment->save();

        $admin = User::where('is_admin', 1)->first();
        Notification::send($admin, new KonfirmasiPembayaran($payment));

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

    public function show($id) {
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
        $cars = Car::where('id', $request->id_mobil)->first();
        $tipe_harga = ($request->tipe_peminjaman == 3 ? 200000 : ($request->tipe_peminjaman == 2 ? 100000 : 0));
        $harga = (intval($cars->harga) + $tipe_harga) * intval($request->lama_sewa);
        $habis_sewa = Carbon::parse($request->mulai_sewa)->addDay($request->lama_sewa);

        // BUAT PESANAN
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

            Alert::success('Berhasil', 'Pesanan anda telah ditambahkan');
            return redirect()->route('rentUser.index');
        }

        // cek harga dengan mengembalikan nilai harga
        return back()->withInput()->with('harga', $harga);
    }
}
