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
                        <label for="driver_name">Nama driver</label>
                        <input type="text" class="form-control" name="driver_name" value="{{ $driver->driver_name }}">
                    </div>
                    <div class="form-group">
                        <label for="driver_age">Umur driver</label>
                        <input type="text" class="form-control" name="driver_age" value="{{ $driver->driver_age }}">
                    </div>
                    <div class="form-group">
                        <label for="driver_phone">Nomor telepon</label>
                        <input class="form-control" type="text" name="driver_phone" value="{{ $driver->driver_phone }}">
                    </div>
                    <div class="form-group">
                        <label for="driver_address">Alamat driver</label>
                        <textarea class="form-control" name="driver_address">{{ $driver->driver_address }}</textarea>
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