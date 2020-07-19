@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('CustomerUser.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="namaLengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_ktp">Nomor ktp</label>
                            <input type="text" name="nomor_ktp" id="nomor_ktp" class="form-control" placeholder="" aria-describedby="nomorKtp" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor telepon</label>
                            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" placeholder="" aria-describedby="nomorTelepone">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat lengkap</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection