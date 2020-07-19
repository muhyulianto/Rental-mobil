@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex border-0">
                <h4 class="card-title my-auto mr-auto">
                    <a href="{{ route('payment.index') }}" class="mr-3">
                        <span class="fa fa-arrow-left text-primary"></span>
                    </a>
                    Detail tagihan
                </h4>
                </h4>
                @if ($payment->rents->status == 'pending')
                <form class="d-inline" action="{{ route('payment.update', $payment->id) }}" method="post">
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
                                {{ $payment->rents->format_harga_mobil }}
                            </td>
                            <td>
                                {{ $payment->rents->format_lama_sewa }}
                            </td>
                            <th class="text-right">
                                {{ $payment->rents->format_harga_mobil }}
                            </th>
                        </tr>
                        @if ($payment->rents->tipe_peminjaman != 1)
                        <tr>
                            <td class="w-50">Sopir</td>
                            <td>
                                Rp.100000,-
                            </td>
                            <td>
                                {{ $payment->rents->format_lama_sewa }}
                            </td>
                            <th class="text-right">{{ $payment->rents->format_harga_driver }}</th>
                        <tr>
                        @endif
                        @if ($payment->rents->tipe_peminjaman == 3)
                        <tr>
                            <td class="w-50">Bahan bakar</td>
                            <td>
                                Rp.100000,-
                            </td>
                            <td>
                                {{ $payment->rents->format_lama_sewa }}
                            </td>
                            <th class="text-right">
                                {{ $payment->rents->format_harga_bahan_bakar }}
                            </th>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="3">
                                Total akhir
                            </td>
                            <th class="text-right border-top">
                                {{ $payment->rents->format_total_harga }}
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
                <img src="{{ asset('storage/bukti/'.$payment->bukti_pembayaran) }}" class="img-fluid text-danger" alt="Pelanggan belum mengupload bukti pembayaran">
            </div>
        </div>
    </div>
</div>
@endsection