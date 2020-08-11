<?php

namespace App\Http\Controllers;

use Alert;
use App\Invoice;
use App\Rent;
use App\Armada;
use App\Driver;
use Illuminate\Http\Request;

class InvoiceController extends Controller
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
            $invoices = Invoice::with('customers')
                ->join('customers', 'invoices.customer_id', '=', 'customers.id')
                ->select('invoices.*', 'customers.name')
                ->where('name', 'LIKE', '%' . $request->search_query . '%')
                ->orWhere('invoice_number', 'LIKE', '%' . $request->search_query . '%')
                ->orWhere('total_price', 'LIKE', '%' . $request->search_query . '%')
                ->orWhere('status', 'LIKE', '%' . $request->search_query . '%')
                ->orderBy($orderBy, $orderType)
                ->paginate(10);
        } else {
            $invoices = Invoice::with('customers')
                ->join('customers', 'invoices.customer_id', '=', 'customers.id')
                ->select('invoices.*', 'customers.name')
                ->orderBy($orderBy, $orderType)
                ->paginate(10);
        }

        // append order query
        if ($orderBy != 'created_at') {
            $invoices->appends([
                'orderBy'   => $orderBy,
                'orderType' => $orderType
            ]);
        }

        return view('Invoice.index')->with([
            'invoices' => $invoices,
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
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoice = Invoice::with("rents", "customers")
            ->where("id", $invoice->id)
            ->first();

        return view("invoice.show")->with("invoice", $invoice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice = Invoice::find($invoice->id);
        $invoice->status = 'paid';
        $invoice->save();

        Alert::success('Berhasil', 'Pembayaran telah dikonfirmasi');
        return redirect()->route('pending_show', $invoice->rents->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
    }
}
