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
                                <label for="name">Nama lengkap</label>
                                <input type="text" name="name" value="{{ $customer->name }}" id="name" class="form-control" placeholder="" aria-describedby="name">
                            </div>
                            <div class="form-group">
                                <label for="id_card_number">Nomor ktp</label>
                                <input type="text" name="id_card_number" value="{{ $customer->id_card_number }}" id="id_card_number" class="form-control" placeholder="" aria-describedby="id_card_number">
                            </div>
                            <div class="form-group">
                                <label for="name">Nomor telepon</label>
                                <input type="text" name="name" value="{{ $customer->name }}" id="name" class="form-control" placeholder="" aria-describedby="name">
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea name="address" class="form-control" id="address">{{ $customer->address }}</textarea>
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