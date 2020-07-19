<?php

namespace App\Http\Controllers;

use Alert;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        // set default order value
        $orderBy = $request->orderBy ? $request->orderBy : 'created_at';
        $orderType = $request->orderType ? $request->orderType : 'DESC';

        if ($request->has('search_query')) {
            $customers = Customer::where('nama', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('nomor_ktp', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('nomor_telepon', 'LIKE', '%'.$request->search_query.'%')
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        } else {
            $customers = Customer::orderBy($orderBy, $orderType)
            ->paginate(10);
        }

        // append order query
        if ($orderBy != 'created_at') {
            $customers->appends([
                'orderBy'   => $orderBy,
                'orderType' => $orderType
            ]);
        }

        return view('customer.index')->with([
            'customers' => $customers,
            'orderType' => $orderType == 'DESC' ? 'ASC' : 'DESC'
        ]);
    }

    public function show($id) {
        $customer = Customer::find($id);
        return view('customer.show')->with('customer', $customer);
    }

    public function store(Request $request) {
        $customer = new Customer;
        $customer->nama = $request->nama;
        $customer->nomor_ktp = $request->nomor_ktp;
        $customer->nomor_telepon = $request->nomor_telepon;
        $customer->alamat = $request->alamat;
        $customer->save();

        Alert::success('Berhasil', 'Data telah ditambahkan!');
        return redirect()->back();
    }

    public function edit(Customer $customer) {
        $customer = Customer::find($customer->id);

        return view('customer.edit')->with([
            'customer' => $customer
        ]);
    }

    public function update(Request $request, Customer $customer) {
        $customer = Customer::find($customer->id);
        $customer->nama = $request->nama;
        $customer->nomor_ktp = $request->nomor_ktp;
        $customer->nomor_telepon = $request->nomor_telepon;
        $customer->alamat = $request->alamat;
        $customer->save();

        Alert::success('Berhasil', 'Data telah diupdate');
        return redirect()->route('customer.index');
    }

    public function destroy(Customer $customer) {
        Customer::find($customer->id)->delete();

        Alert::success('Berhasil', 'Data telah dihapus!');
        return redirect()->back();
    }

}