@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center border-bottom-0">
            <h4 class="card-title text-bold">
                Data armada
            </h4> 
            <form method="GET" action="{{ route('armada.index') }}" class="input-group ml-auto mr-2" style="width: 250px">
                <input type="text" class="form-control bg-light" name="search_query" placeholder="search" required>
                <div class="input-group-append">
                    <button class="btn btn-light px-3 border"><span class="fa fa-search"></span></button>
                </div>
            </form>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#armada">
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
                                    'orderBy'   => 'nama_mobil',
                                    'orderType' => $orderType
                                ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                    NAMA MOBIL
                                    <i class="fas fa-sort"></i>
                                </a>
                            </th>
                            <th>
                                <a href="{{ Request::fullUrlWithQuery([
                                    'orderBy'   => 'nomor_plat',
                                    'orderType' => $orderType
                                ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                    NOMOR PLAT
                                    <i class="fas fa-sort"></i>
                                </a>
                            </th>
                            <th>
                                <a href="{{ Request::fullUrlWithQuery([
                                    'orderBy'   => 'status',
                                    'orderType' => $orderType
                                ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                    STATUS
                                    <i class="fas fa-sort"></i>
                                </a>
                            </th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($armadas as $key => $armada)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td scope="row">
                                <a href="{{ route("car.show", $armada->cars->id) }}">
                                    {{ $armada->format_nama_mobil }}
                                </a>
                            </td>
                            <td>
                                {{ $armada->nomor_plat }}
                            </td>
                            <td>
                                {{ $armada->status }}
                            </td>
                            <td class="text-right">
                                <a href="{{ route("armada.edit", $armada->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-pencil-alt    "></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                                    <i class="fas fa-trash    "></i>
                                </button>
                            </td>
                        </tr>
                        @include('armada.modalDelete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('armada.create')
@endsection