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
                <img src="{{ asset('storage/images/'.$car->image) }}" alt="silakan tambah gambar mobil di menu edit" class="img-fluid" style="max-height: 400px; object-fit: cover">
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-center">
                    <table class="table w-75">
                        <tr>
                            <td class="text-muted border-top-0">Jenis mobil</td>
                            <th class="text-right border-top-0">{{ $car->type }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Merk mobil</td>
                            <th class="text-right">{{ $car->brand }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Car Name</td>
                            <th class="text-right">{{ $car->name }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Bahan bakar</td>
                            <th class="text-right">{{ $car->fuel }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted">Harga mobil</td>
                            <th class="text-right">{{ $car->format_price }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection