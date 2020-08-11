@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex border-0">
                <h4 class="card-title my-auto mr-auto">
                    <a href="{{ route('invoice.index') }}" class="mr-3">
                        <span class="fa fa-arrow-left text-primary"></span>
                    </a>
                    Detail tagihan
                </h4>
                </h4>
                @if ($invoice->rents->status == 'pending')
                <form class="d-inline" action="{{ route('invoice.update', $invoice->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check    "></i> Konfirmasi
                    </button>
                </form>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Jasa</th>
                            <th>Biaya</th>
                            <th>Waktu</th>
                            <th class="text-right">Total</th>
                        </tr>
                        <tr>
                            <td class="w-50">Mobil</td>
                            <td>
                                {{ $invoice->rents->cars->format_price }}
                            </td>
                            <td>
                                {{ $invoice->rents->format_duration }}
                            </td>
                            <th class="text-right">
                                {{ $invoice->rents->format_car_price }}
                            </th>
                        </tr>
                        @if ($invoice->rents->services_type != 1)
                        <tr>
                            <td class="w-50">Sopir</td>
                            <td>
                                Rp.100000,-
                            </td>
                            <td>
                                {{ $invoice->rents->format_duration }}
                            </td>
                            <th class="text-right">{{ $invoice->rents->format_driver_price }}</th>
                        <tr>
                        @endif
                        @if ($invoice->rents->services_type == 3)
                        <tr>
                            <td class="w-50">Bahan bakar</td>
                            <td>
                                Rp.100000,-
                            </td>
                            <td>
                                {{ $invoice->rents->format_duration }}
                            </td>
                            <th class="text-right">
                                {{ $invoice->rents->format_fuel_price }}
                            </th>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="3">
                                Total akhir
                            </td>
                            <th class="text-right border-top">
                                {{ $invoice->rents->format_total_price }}
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Bukti pembayaran
                </div>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('storage/bukti/'.$invoice->payment_proof) }}" class="img-fluid text-danger" alt="Pelanggan belum mengupload bukti pembayaran">
            </div>
        </div>
    </div>
</div>
@endsection