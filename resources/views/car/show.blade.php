@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-header border-bottom-0">
        <div class="card-title">
            <a href="{{ url()->previous() }}" class="mr-3">
                <span class="fa fa-arrow-left text-primary"></span>
            </a>
            Informasi detail mobil
        </div>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center">
                <img src="{{ asset('storage/images/'.$car->gambar) }}" alt="silakan tambah gambar mobil di menu edit" style="max-height: 400px; object-fit: cover">
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-center">
                    <table class="table w-75">
                        <tr>
                            <td class="text-muted border-top-0">Jenis mobil</td>
                            <th class="text-right border-top-0">{{ $car->jenis_mobil }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Merk mobil</td>
                            <th class="text-right">{{ $car->merk_mobil }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Nama mobil</td>
                            <th class="text-right">{{ $car->nama_mobil }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Bahan bakar</td>
                            <th class="text-right">{{ $car->bahan_bakar }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Harga mobil</td>
                            <th class="text-right">{{ $car->format_harga }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection