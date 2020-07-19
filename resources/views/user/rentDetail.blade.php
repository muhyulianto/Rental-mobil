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
                        <img src="{{ asset('storage/images/'.$rent->cars->gambar) }}" class="img-fluid" alt="">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-muted w-50">Nama penyewa</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection