@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-header d-flex flex-wrap align-items-center border-bottom-0">
        <h4 class="card-title text-bold">Data driver</h4> 
        <form method="GET" action="{{ route('driver.index') }}" class="input-group ml-auto mr-2" style="width: 250px">
            <input type="text" class="form-control bg-light" name="search_query" placeholder="search" required>
            <div class="input-group-append">
                <button class="btn btn-light px-3 border"><span class="fa fa-search"></span></button>
            </div>
        </form>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#driver">
            <span class="fa fa-plus"></span>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            NO
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'driver_name',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                NAMA DRIVER
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'driver_age',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                UMUR DRIVER
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'driver_address',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                ALAMAT DRIVER
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'driver_status',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                STATUS
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'driver_phone',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                NOMOR TELEPON
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $key => $driver)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            {{ $driver->driver_name }}
                        </td>
                        <td>
                            {{ $driver->format_driver_age }}
                        </td>
                        <td>
                            {{ $driver->driver_address }}
                        </td>
                        <td>
                            {{ $driver->driver_status }}
                        </td>
                        <td>
                            {{ $driver->driver_phone }}
                        </td>
                        <td class="text-right">
                            <a href="{{ route("driver.edit", $driver->id) }}" type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt    "></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                                <i class="fas fa-trash    "></i>
                            </button>
                            @include('driver.modalDelete')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('driver.create')
@endsection