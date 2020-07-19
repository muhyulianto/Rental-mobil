@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-header d-flex flex-wrap border-bottom-0">
        <h4 class="card-title text-bold align-self-center">
            Daftar tagihan
        </h4> 
        <form method="GET" action="{{ route('payment.index') }}" class="input-group ml-auto" style="width: 250px">
            <input type="text" class="form-control bg-light" name="search_query" placeholder="search" required>
            <div class="input-group-append">
                <button class="btn btn-light btn-sm px-3 border"><span class="fa fa-search"></span></button>
            </div>
        </form>
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
                            NOMOR TAGIHAN
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'nama',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                NAMA PELANGGAN
                                <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery([
                                'orderBy'   => 'total_harga',
                                'orderType' => $orderType
                            ]) }}" class="btn btn-link text-dark font-weight-bold p-0">
                                TOTAL TAGIHAN
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
                    @foreach ($payments as $key => $payment)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            {{ $payment->nomor_tagihan }}
                        </td>
                        <td>
                            <a href="{{ route("customer.show", $payment->customers->id) }}">
                                {{ $payment->customers->nama }}
                            </a>
                        </td>
                        <td>
                            {{ $payment->format_total_harga }}
                        </td>
                        <td>
                            @if ($payment->status == 'utang')
                            <div class="text-danger">
                                <i class="fa fa-hourglass-half" aria-hidden="true"></i> Belum dibayar
                            </div>
                            @else
                            <div class="text-success">
                                <i class="fas fa-check    "></i> {{ $payment->status}}
                            </div>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="{{ route("payment.show", $payment->id) }}" class="btn btn-success btn-sm" >
                                <i class="fas fa-eye    "></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $payments->links() }}
    </div>
</div>
@endsection