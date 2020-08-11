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
            $customers = Customer::where('name', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('id_card_number', 'LIKE', '%'.$request->search_query.'%')
            ->orWhere('name', 'LIKE', '%'.$request->search_query.'%')
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
        $customer->name = $request->name;
        $customer->id_card_number = $request->id_card_number;
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
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
        $customer->name = $request->name;
        $customer->id_card_number = $request->id_card_number;
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
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