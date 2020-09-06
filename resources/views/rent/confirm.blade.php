@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-md-6">
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
                            <th class="text-right">{{ $rent->car_full_name }}</th>
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
                        @if (!empty($rent->pickup_location))
                        <tr>
                            <td class="text-muted">Lokasi penjemputan</td>
                            <th class="text-right">{{ $rent->pickup_location }}</th>
                        </tr>
                        @endif
                        <tr>
                            <td class="text-muted">Status</td>
                            <th class="text-right">
                                {{ $rent->status }}
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Konfirmasi pesanan
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route("rents.update_pending", $rent->id) }}" method="post">
                    <input class="d-none" type="text" name="id" value="{{ $rent->id }}">
                    <div class="form-group">
                        <label for="mobil">Mobil</label>
                        <input type="text" id="mobil" class="form-control" value="{{ $rent->car_full_name }}" aria-describedby="mobil_help" disabled >
                    </div>
                    <div class="form-group">
                        <label for="id_armada">Pilih armada</label>
                        <select class="form-control" name="id_armada" id="id_armada">
                            <option disabled selected></option>
                            @foreach ($armadas as $armada)
                                <option value="{{ $armada->id }}">
                                    {{ $armada->license_plate }}
                                </option> 
                            @endforeach
                        </select>
                        @forelse ($armadas as $item)
                        @empty
                        <p class="form-text text-muted">
                            Silakan tambah armada terlebih dahulu
                        </p>
                        @endforelse
                    </div>
                    @if ($rent->services_type != 1)
                    <div class="form-group">
                        <label for="driver_id">Pilih driver</label>
                        <select class="form-control" name="driver_id" id="driver_id">
                            <option disabled selected></option>
                            @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">
                                {{ $driver->name }}
                            </option>
                            @endforeach
                        </select>
                        </div>
                        @forelse ($drivers as $item)
                        @empty
                        <p class="form-text text-muted">
                            Semua driver sedang sibuk, silakan tambah driver terlebih dahulu
                        </p>
                        @endforelse
                    @endif
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection