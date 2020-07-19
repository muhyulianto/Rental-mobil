@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-stretch mt-5">
        <div class="col-lg-4 mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0">
                    <div class="card-title">Informasi mobil</div>
                </div>
                <div class="card-body">
                    <img class="img-fluid mb-3" src="{{ asset('storage/images/'.$cars->gambar) }}" alt="gambar_mobil">
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-muted w-50">Jenis mobil</td>
                            <th class="text-right">{{ $cars->jenis_mobil }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Nama mobil</td>
                            <th class="text-right">{{ $cars->nama_mobil }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Merk mobil</td>
                            <th class="text-right">{{ $cars->merk_mobil }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Bahan bakar</td>
                            <th class="text-right">{{ $cars->bahan_bakar }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Harga</td>
                            <th class="text-right">{{ $cars->format_harga }} / hari</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0">
                    <div class="card-title">Pemesanan</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('rentUser.store') }}" method="post" id="store_rent">
                        @csrf
                        <input type="hidden" name="id_mobil" value="{{ $cars->id }}">
                        <input type="hidden" name="id_customer" value="{{ empty($user->customers) ? "" : $user->customers->id }}">
                        <div class="form-group">
                            <label for="id_customer">Data diri</label>
                            <input type="text" class="form-control" id="id_customer" disabled value="{{ empty($user->customers) ? '' : $user->customers->nama }}">
                            @empty($user->customers)
                            <small id="helpId" class="form-text text-danger">
                                Anda belum melengkapi data diri anda silahkan lengkapi data anda terlebih dahulu
                                <a href="{{ route('CustomerUser.create') }}"> disini!</a>
                            </small>
                            @endempty
                        </div>
                        <div class="form-group">
                            <label for="tipe_peminjaman">Tipe peminjaman</label>
                            <select class="form-control pointer" name="tipe_peminjaman" id="tipe_peminjaman" required>
                                <option disabled {{ (old('tipe_peminjaman') ? '' : 'selected')}}></option>
                                <option value="1" {{ (old('tipe_peminjaman') == '1' ? 'selected' : '')}}>Hanya mobil</option>
                                <option value="2" {{ (old('tipe_peminjaman') == '2' ? 'selected' : '')}}>Mobil dan sopir</option>
                                <option value="3" {{ (old('tipe_peminjaman') == '3' ? 'selected' : '')}}>Mobil, sopir dan bahan bakar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Mulai sewa</label>
                            <input type="date" id="mulai_sewa" name="mulai_sewa" value="{{ old('mulai_sewa') }}" class="form-control pointer" min="2020-04-21" required>
                        </div>
                        <div class="form-group">
                            <label for="lama_sewa">Lama sewa</label>
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="lama_sewa" id="lama_sewa" value="{{ old('lama_sewa') }}" autocomplete="off" required>
                                <div class="input-group-append">
                                    <label class="input-group-text">Hari</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="lokasi_penjemputan">
                            <label for="lokasi_penjemputan">Lokasi penjemputan</label>
                            <textarea name="lokasi_penjemputan" class="form-control">{{ old('lokasi_penjemputan') }}</textarea>
                            <small id="helpId" class="text-muted">Lokasi penjemputan jika anda menyewa sopir</small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Estimasi harga</label>
                            <div class="input-group">
                                <input name="harga" id="harga" class="form-control" value="{{ session()->get('harga') }}" disabled>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" name="cek" type="submit" value="0" id="cek_estimasi">
                                        Cek harga
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button name="create" value="1" type="submit" class="btn btn-primary mt-3">
                            <i class="fa fa-shopping-cart text-white" aria-hidden="true"></i>
                            Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
