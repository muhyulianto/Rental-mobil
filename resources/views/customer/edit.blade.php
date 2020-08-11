@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    <a href="{{ url()->previous() }}" class="mr-3">
                        <span class="fa fa-arrow-left text-primary"></span>
                    </a>
                    Customer edit
                </div>
            </div>
            <div class="card-body">
                {{-- <img class="img-fluid d-block mx-auto mb-4" style="height: 250px;" src="{{ asset("images/$customer->profile") }}" alt="" srcset=""> --}}
                <form action="{{ route('customer.update', $customer->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama customer</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="name" value="{{ $customer->name }}">
                    </div>
                    <div class="form-group">
                        <label for="id_card_number">Nomor ktp</label>
                        <input type="text" name="id_card_number" id="id_card_number" class="form-control" placeholder="" aria-describedby="name" value="{{ $customer->id_card_number }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor telepon</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="" aria-describedby="name" value="{{ $customer->name }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" class="form-control">{{ $customer->address }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload    "></i>
                        Update
                    </button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left    "></i>
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection