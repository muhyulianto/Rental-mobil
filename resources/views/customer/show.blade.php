@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    <a href="{{ url()->previous() }}" class="mr-3">
                        <span class="fa fa-arrow-left text-primary"></span>
                    </a>
                    Customer data
                </div>
            </div>
            <div class="card-body">
                {{-- <img class="img-fluid d-block mx-auto mb-4" style="height: 250px;" src="{{ asset("images/$customer->profile") }}" alt="" srcset=""> --}}
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td class="text-muted border-top-0 w-50">Nama lengkap</td>
                            <th class="text-right border-top-0">{{ $customer->name }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Nomor ktp</td>
                            <th class="text-right">{{ $customer->id_card_number }}</>
                        </tr>
                        <tr>
                            <td class="text-muted">Phone Number</td>
                            <th class="text-right">{{ $customer->name }}</>
                        </tr>
                        <tr>
                            <td class="text-muted">Address</td>
                            <th class="text-right">{{ $customer->address }}</>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection