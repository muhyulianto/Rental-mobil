@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 mt-5">
                <div class="card text-left">
                    <div class="card-body">
                        <form action="{{ route('CustomerUser.update', $customer->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama lengkap</label>
                                <input type="text" name="nama" value="{{ $customer->nama }}" id="nama" class="form-control" placeholder="" aria-describedby="nama">
                            </div>
                            <div class="form-group">
                                <label for="nomor_ktp">Nomor ktp</label>
                                <input type="text" name="nomor_ktp" value="{{ $customer->nomor_ktp }}" id="nomor_ktp" class="form-control" placeholder="" aria-describedby="nomor_ktp">
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor telepon</label>
                                <input type="text" name="nomor_telepon" value="{{ $customer->nomor_telepon }}" id="nomor_telepon" class="form-control" placeholder="" aria-describedby="nomor_telepon">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat">{{ $customer->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection