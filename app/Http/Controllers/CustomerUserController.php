<?php

namespace App\Http\Controllers;

use App\Customer;
use Auth;
use Illuminate\Http\Request;

class CustomerUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        return view('user.indexCustomer')->with([
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.createCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $customer = new Customer;
        $customer->user_id = $user_id;
        $customer->name = $request->name;
        $customer->id_card_number = $request->id_card_number;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('CustomerUser.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        return view('user.editCustomer')->with([
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->id_card_number = $request->id_card_number;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('CustomerUser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
