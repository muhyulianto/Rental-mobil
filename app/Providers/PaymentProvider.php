<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class PaymentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // MEMBUAT TAGIHAN SAAT PENYEWAAN DIBUAT
        \App\Rent::created(function ($rent) {
            // MEMBUAT TAGIHAN
            $payment = new \App\Payment;
            $payment->id_customer = $rent->id_customer;
            $payment->id_peminjaman = $rent->id;
            $payment->total_harga = $rent->total_harga;
            $payment->save();
        });

        // MEMBUAT NOMOR TAGIHAN PEMBAYARAN
        \App\Payment::created(function ($payment) {
            $payment->update([
                'nomor_tagihan' => 'TGH-' . Carbon::now()->format('Ymd') . $payment->id
            ]);
        });
    }
}
