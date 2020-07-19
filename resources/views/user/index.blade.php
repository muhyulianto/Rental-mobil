@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col mt-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <table class="table table-vertical-center">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama mobil</th>
                                <th>Tipe peminjaman</th>
                                <th>Status</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rents as $key => $rent)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $rent->nama_lengkap_mobil }}
                                </td>
                                <td>
                                    {{ $rent->format_tipe_peminjaman }}
                                </td>
                                <td>
                                    @if ($rent->status == 'pending')
                                    <div class="text-danger" role="alert">
                                        <i class="fas fa-hourglass-half    "></i> {{ $rent->status }}
                                    </div>
                                    @elseif($rent->status == 'jalan')
                                    <div class="text-success" role="alert">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                        dikonfirmasi
                                    </div>
                                    @else
                                    <div class="text-primary" role="alert">
                                        <i class="fas fa-check    "></i> selesai
                                    </div>
                                    @endif
                                </td>
                                <td class="text-right">
                                <a href="{{ route('rentUser.show', $rent->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-eye    "></i> Detail
                                    </a>
                                    @if ($rent->status == 'pending')
                                    <a href="{{ route('rentUser.bayar', $rent->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-money-bill    "></i> Bayar
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">
                                    Data not found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection