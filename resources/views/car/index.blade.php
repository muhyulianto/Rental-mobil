@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-header d-flex flex-wrap align-items-center border-bottom-0">
        <h4 class="card-title text-bold">Data mobil</h4> 
        <form method="GET" action="{{ route('car.index') }}" class="input-group ml-auto mr-2" style="width: 250px">
            <input type="text" class="form-control bg-light" name="search_query" placeholder="search" required>
            <div class="input-group-append">
                <button class="btn btn-light px-3 border"><span class="fa fa-search"></span></button>
            </div>
        </form>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mobil">
            <span class="fa fa-plus"></span>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-vertical-center">
                <thead>
                    <tr>
                        <th>
                            NO
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'jenis_mobil',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                JENIS MOBIL
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'merk_mobil',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                MERK MOBIL
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'nama_mobil',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                NAMA MOBIL
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'harga',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                HARGA
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'armadas_count',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                ARMADA
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th style="width: 180px" class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cars as $key => $car)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td scope="row">{{ $car->jenis_mobil }}</td>
                        <td>{{ $car->merk_mobil }}</td>
                        <td>{{ $car->nama_mobil }}</td>
                        <td>{{ $car->format_harga }}</td>
                        <td>{{ $car->format_jumlah_armada }}</td>
                        <td class="text-right">
                            <a href="{{ route('car.show', $car->id) }}" class="btn btn-success btn-sm"><span class="fa fa-eye"></span></a>
                            <a href="{{ route('car.edit', $car->id) }}" type="button" class="btn btn-primary btn-sm"><span class="fa fa-pen"></span></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                                <i class="fas fa-trash    "></i>
                            </button>
                            @include('car.modalDelete')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('car.create')
@endsection
