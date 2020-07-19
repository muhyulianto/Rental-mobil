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
                            <td class="text-muted w-50">Nama pelanggan</td>
                            <th class="text-right">{{ $rent->customers->nama }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Nama mobil</td>
                            <th class="text-right">{{ $rent->nama_lengkap_mobil }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Mulai sewa</td>
                            <th class="text-right">{{ $rent->format_mulai_sewa }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Lama sewa</td>
                            <th class="text-right">{{ $rent->format_lama_sewa }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Habis sewa</td>
                            <th class="text-right">{{ $rent->format_habis_sewa }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Tipe peminjaman</td>
                            <th class="text-right">{{ $rent->format_tipe_peminjaman }}</th>
                        </tr>
                        @if (!empty($rent->lokasi_penjemputan))
                        <tr>
                            <td class="text-muted">Lokasi penjemputan</td>
                            <th class="text-right">{{ $rent->lokasi_penjemputan }}</th>
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
                <form action="{{ route("pending_update") }}" method="post">
                    <input class="d-none" type="text" name="id" value="{{ $rent->id }}">
                    <div class="form-group">
                        <label for="mobil">Mobil</label>
                        <input type="text" id="mobil" class="form-control" value="{{ $rent->nama_lengkap_mobil }}" aria-describedby="mobil_help" disabled >
                        <small id="mobil_help" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="id_armada">Pilih armada</label>
                        <select class="form-control" name="id_armada" id="id_armada">
                            <option disabled selected></option>
                            @foreach ($armadas as $armada)
                                <option value="{{ $armada->id }}">
                                    {{ $armada->nomor_plat }}
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
                    @if ($rent->tipe_peminjaman != 1)
                    <div class="form-group">
                        <label for="id_driver">Pilih driver</label>
                        <select class="form-control" name="id_driver" id="id_driver">
                            <option disabled selected></option>
                            @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">
                                {{ $driver->driver_name }}
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