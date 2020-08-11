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
                    Informasi lengkap sewa
                </div>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="text-muted w-50">Customer Name</td>
                            <th class="text-right">{{ $rent->customers->name }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Car Name</td>
                            <th class="text-right">{{ $rent->nama_lengkap_mobil }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Nomor plat</td>
                            <th class="text-right">{{ $rent->armadas->license_plate }}</th>
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
                        @if ($rent->services_type != 1)
                        <tr>
                            <td class="text-muted">Driver</td>
                            <th class="text-right">{{ $rent->drivers->name }}</th>
                        </tr>
                        @endif
                        @isset($rent->pickup_location)
                        <tr>
                            <td class="text-muted">Lokasi penjemputan</td>
                            <th class="text-right">{{ $rent->pickup_location }}</th>
                        </tr>
                        @endisset
                        <tr>
                            <td class="text-muted">Status</td>
                            <th class="text-right">
                                {{ $rent->status }}
                            </th>
                        </tr>
                    </tbody>
                </table>
                @if ($rent->status == 'onloan')
                <form class="mt-4" action="{{ route('rent_update', $rent->id) }}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-forward    "></i>
                        Kembalikan
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection