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
                            <label for="name">Nama lengkap</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="namaLengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="id_card_number">Nomor ktp</label>
                            <input type="text" name="id_card_number" id="id_card_number" class="form-control" placeholder="" aria-describedby="nomorKtp" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Nomor telepon</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="nomorTelepone">
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat lengkap</label>
                            <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection