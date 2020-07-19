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
                            <td class="text-muted w-50">Nama pelanggan</td>
                            <th class="text-right">{{ $rent->customers->nama }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Nama mobil</td>
                            <th class="text-right">{{ $rent->nama_lengkap_mobil }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Nomor plat</td>
                            <th class="text-right">{{ $rent->armadas->nomor_plat }}</th>
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
                        @if ($rent->tipe_peminjaman != 1)
                        <tr>
                            <td class="text-muted">Driver</td>
                            <th class="text-right">{{ $rent->drivers->driver_name }}</th>
                        </tr>
                        @endif
                        @isset($rent->lokasi_penjemputan)
                        <tr>
                            <td class="text-muted">Lokasi penjemputan</td>
                            <th class="text-right">{{ $rent->lokasi_penjemputan }}</th>
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
                @if ($rent->status == 'jalan')
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