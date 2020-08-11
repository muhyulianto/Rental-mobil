@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Edit data driver
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route("driver.update", $driver->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Nama driver</label>
                        <input type="text" class="form-control" name="name" value="{{ $driver->name }}">
                    </div>
                    <div class="form-group">
                        <label for="age">Umur driver</label>
                        <input type="text" class="form-control" name="age" value="{{ $driver->age }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor telepon</label>
                        <input class="form-control" type="text" name="phone_number" value="{{ $driver->phone_number }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat driver</label>
                        <textarea class="form-control" name="address">{{ $driver->address }}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-upload    "></i>
                        Update
                    </button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left    "></i>
                        Batal
                    </a>
                </form>
            </div>
        </div> 
    </div>
</div>
@endsection