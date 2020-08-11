<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class InvoiceProvider extends ServiceProvider
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
            $invoice = new \App\Invoice;
            $invoice->customer_id = $rent->customer_id;
            $invoice->rent_id = $rent->id;
            $invoice->total_price = $rent->total_price;
            $invoice->save();
        });

        // MEMBUAT NOMOR TAGIHAN PEMBAYARAN
        \App\Invoice::created(function ($invoice) {
            $invoice->update([
                'invoice_number' => 'TGH-' . Carbon::now()->format('Ymd') . $invoice->id
            ]);
        });
    }
}
