@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-header d-flex flex-wrap border-0">
                        <div class="card-title align-self-center">
                            Data diri
                        </div>
                        @if (empty($customer))
                        <a href="{{ route("CustomerUser.create") }}" class="btn btn-primary btn-sm ml-auto">
                            <i class="fas fa-plus    "></i>
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if (!empty($customer))
                        <table class="table table-borderless mb-5">
                            <tr>
                                <td>Nama</td>
                                <th class="text-right">
                                    {{ $customer->name }}
                                </th>
                            </tr>
                            <tr>
                                <td>Nomor ktp</td>
                                <th class="text-right">
                                    {{ $customer->id_card_number }}
                                </th>
                            </tr>
                            <tr>
                                <td>Nomor telepon</td>
                                <th class="text-right">
                                    {{ $customer->name }}
                                </th>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <th class="text-right">
                                    {{ $customer->address }}
                                </th>
                            </tr>
                        </table>
                        <a href="{{ route('CustomerUser.edit', $customer->id) }}" class="btn btn-primary">
                            Edit
                        </a>
                        @else
                        <div class="text-center text-danger">
                            Data not found
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection