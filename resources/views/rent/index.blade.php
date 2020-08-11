@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex flex-wrap border-bottom-0">
                <h4 class="card-title text-bold align-self-end mb-2">Daftar penyewaan</h4> 
                <form method="GET" action="{{ url()->current() }}" class="input-group ml-auto mr-2" style="width: 250px">
                    <input type="text" class="form-control bg-light" name="search_query" placeholder="search" required>
                    <div class="input-group-append">
                        <button class="btn btn-light btn-sm px-3 border"><span class="fa fa-search"></span></button>
                    </div>
                </form>
                <a class="btn btn-primary" href="{{ route('create_rent_admin') }}" role="button">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive mb-4">
                    <table class="table table-vertical-center">
                        <thead>
                            <tr>
                                <th>
                                    NO
                                </th>
                                <th>
                                    <a href="{{ Request::fullUrlWithQuery([
                                        'orderBy'   => 'name',
                                        'orderType' => $orderType
                                    ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                        Customer Name
                                        <i class="fas fa-sort"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ Request::fullUrlWithQuery([
                                        'orderBy'   => 'name',
                                        'orderType' => $orderType
                                    ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                        Car Name
                                        <i class="fas fa-sort"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ Request::fullUrlWithQuery([
                                        'orderBy'   => 'start_date',
                                        'orderType' => $orderType
                                    ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                        Start date
                                        <i class="fas fa-sort"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ Request::fullUrlWithQuery([
                                        'orderBy'   => 'duration',
                                        'orderType' => $orderType
                                    ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                        Duration
                                        <i class="fas fa-sort"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ Request::fullUrlWithQuery([
                                        'orderBy'   => 'services_type',
                                        'orderType' => $orderType
                                    ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                        Services Type
                                        <i class="fas fa-sort"></i>
                                    </a>
                                </th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rents as $key => $rent)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    <a href="{{ route("customer.show", $rent->customer_id) }}">
                                        {{ $rent->name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route("car.show", $rent->car_id) }}">
                                        {{ $rent->nama_lengkap_mobil}}
                                    </a>
                                </td>
                                <td>{{ $rent->format_start_date }}</td>
                                <td>{{ $rent->format_duration }}</td>
                                <td>
                                    {{ $rent->format_services_type }}
                                </td>
                                <td class="text-right">

                                    @if ($rent->status == 'pending')
                                    <a href="{{ route('pending_show', $rent->id) }}" type="button" class="btn btn-primary btn-sm"><span class="fa fa-check"></span></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                                        <i class="fas fa-trash    "></i>
                                    </button>


                                    @elseif ($rent->status == 'onloan')
                                    <a href="{{ route('rent_show', $rent->id) }}" type="button" class="btn btn-primary btn-sm">
                                        <i class="fas fa-arrow-right    "></i>
                                    </a>

                                    @else
                                    <a href="{{ route('return_info', $rent->id) }}" type="button" class="btn btn-success btn-sm">
                                        <i class="fas fa-eye    "></i>
                                    </a>
                                    @endif

                                </td>
                            </tr>
                            @include('rent.modalDelete')
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">Data not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $rents->links() }}
            </div>
        </div>
    </div>
</div>
@endsection