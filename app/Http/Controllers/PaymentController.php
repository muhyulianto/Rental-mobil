<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Rent;
use App\Armada;
use App\Driver;
use Alert;
use Illuminate\Http\Request;

class PaymentController extends Controller
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
            $payments = Payment::with('customers')
            ->join('customers', 'payments.id_customer', '=', 'customers.id')
            ->select('payments.*', 'customers.nama')
            ->where('nama', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('nomor_tagihan', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('total_harga', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('status', 'LIKE', '%'.$request->search_query.'%')
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        } else {
            $payments = Payment::with('customers')
            ->join('customers', 'payments.id_customer', '=', 'customers.id')
            ->select('payments.*', 'customers.nama')
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        }

        // append order query
        if ($orderBy != 'created_at') {
            $payments->appends([
                'orderBy'   => $orderBy,
                'orderType' => $orderType
            ]);
        }

        return view('payment.index')->with([
            'payments' => $payments,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        $payment = Payment::with("rents", "customers")
        ->where("id", $payment->id)
        ->first();

        return view("payment.show")->with("payment", $payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $payment = Payment::find($payment->id);
        $payment->status = 'lunas';
        $payment->save();

        Alert::success('Berhasil', 'Pembayaran telah dikonfirmasi');
        return redirect()->route('pending_show', $payment->rents->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {

    }
}
