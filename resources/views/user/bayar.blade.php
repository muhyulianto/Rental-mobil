@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 mt-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <a href="{{ route('rentUser.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> Tagihan anda
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless border">
                            <tr class="bg-secondary">
                                <td class="w-50">
                                    Nomor tagihan
                                </td>
                                <th class="text-right">
                                    {{ $payment->nomor_tagihan }}
                                </th>
                            </tr>
                            <tr>
                                <td class="w-50">Mobil</td>
                                <th class="text-right">
                                    {{ $payment->rents->format_harga_mobil }}
                                </th>
                            </tr>
                            @if ($payment->rents->tipe_peminjaman != 1)
                            <tr>
                                <td class="w-50">Sopir</td>
                                <th class="text-right">{{ $payment->rents->format_harga_driver }}</th>
                            <tr>
                            @endif
                            @if ($payment->rents->tipe_peminjaman == 3)
                            <tr>
                                <td class="w-50">Bahan bakar</td>
                                <th class="text-right">
                                    {{ $payment->rents->format_harga_bahan_bakar }}
                                </th>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="1" class="border-top">
                                    Total
                                </td>
                                <th class="text-right border-top">
                                    {{ $payment->rents->format_total_harga }}
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0">
                        <div class="card-title">
                            Konfirmasi pembayaran anda
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('rentUser.konfirmasi', $payment->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <input type="file" class="form-control-file" name="bukti" id="bukti" placeholder="" aria-describedby="buktiHelp" required>
                              <small id="buktiHelp" class="form-text text-muted">Upload bukti pembayaran anda untuk konfirmasi</small>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Upload
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection