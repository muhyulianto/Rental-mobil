@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 mt-4">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <a href="{{ url()->previous() }}">
                                <i class="fas fa-arrow-left    "></i>
                            </a>
                            Detail peminjaman
                        </div>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/images/'.$rent->cars->image) }}" class="img-fluid" alt="">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-muted w-50">Nama penyewa</td>
                                    <th class="text-right">{{ $rent->customers->name }}</th>
                                </tr>
                                <tr>
                                    <td class="text-muted w-50">Car Name</td>
                                    <th class="text-right">{{ $rent->nama_lengkap_mobil }}</th>
                                </tr>
                                <tr>
                                    <td class="text-muted">Start date</td>
                                    <th class="text-right">{{ $rent->format_start_date }}</th>
                                </tr>
                                <tr>
                                    <td class="text-muted">Duration</td>
                                    <th class="text-right">{{ $rent->format_duration }}</th>
                                </tr>
                                <tr>
                                    <td class="text-muted">Habis sewa</td>
                                    <th class="text-right">{{ $rent->format_end_date }}</th>
                                </tr>
                                <tr>
                                    <td class="text-muted">Services Type</td>
                                    <th class="text-right">{{ $rent->format_services_type }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection