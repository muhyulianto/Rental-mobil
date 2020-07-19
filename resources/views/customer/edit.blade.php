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
                        <label for="nama">Nama customer</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="nama" value="{{ $customer->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="nomor_ktp">Nomor ktp</label>
                        <input type="text" name="nomor_ktp" id="nomor_ktp" class="form-control" placeholder="" aria-describedby="nama" value="{{ $customer->nomor_ktp }}">
                    </div>
                    <div class="form-group">
                        <label for="nomor_telepon">Nomor telepon</label>
                        <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" placeholder="" aria-describedby="nama" value="{{ $customer->nomor_telepon }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control">{{ $customer->alamat }}</textarea>
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