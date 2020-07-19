@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-header d-flex flex-wrap border-bottom-0">
        <h4 class="card-title text-bold align-self-end mb-2">Customers List</h4> 
        <form method="GET" action="{{ route('customer.index') }}" class="input-group ml-auto mr-2" style="width: 250px">
            <input type="text" class="form-control bg-light" name="search_query" placeholder="search" required>
            <div class="input-group-append">
                <button class="btn btn-light btn-sm px-3 border"><span class="fa fa-search"></span></button>
            </div>
        </form>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCustomer">
            <i class="fas fa-plus    "></i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive mb-4">
            <table class="table table-vertical-center">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'nama',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                NAMA
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'nomor_ktp',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                NOMOR KTP
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'nomor_telepon',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                NOMOR TELEPON
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th class="text-right" style="width: 130px">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($customers as $key => $customer)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $customer->nama }}</td>
                        <td>{{ $customer->nomor_ktp }}</td>
                        <td>{{ $customer->nomor_telepon }}</td>
                        <td class="text-right">
                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pencil-alt    "></i>
                            </a>
                            <a href="{{ route('customer.show', $customer->id) }}" type="button" class="btn btn-success btn-sm">
                                <i class="fas fa-eye    "></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                                <i class="fas fa-trash    "></i>
                            </button>
                            @include('customer.modalDelete')
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Data not found
                    </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $customers->links() }}
    </div>
</div>
@include('customer.create')
@endsection