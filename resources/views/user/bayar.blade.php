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
                                    {{ $invoice->invoice_number }}
                                </th>
                            </tr>
                            <tr>
                                <td class="w-50">Mobil</td>
                                <th class="text-right">
                                    {{ $invoice->rents->format_price_mobil }}
                                </th>
                            </tr>
                            @if ($invoice->rents->services_type != 1)
                            <tr>
                                <td class="w-50">Sopir</td>
                                <th class="text-right">{{ $invoice->rents->format_price_driver }}</th>
                            <tr>
                            @endif
                            @if ($invoice->rents->services_type == 3)
                            <tr>
                                <td class="w-50">Bahan bakar</td>
                                <th class="text-right">
                                    {{ $invoice->rents->format_price_fuel }}
                                </th>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="1" class="border-top">
                                    Total
                                </td>
                                <th class="text-right border-top">
                                    {{ $invoice->rents->format_total_price }}
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
                        <form action="{{ route('rentUser.konfirmasi', $invoice->id) }}" method="post" enctype="multipart/form-data">
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