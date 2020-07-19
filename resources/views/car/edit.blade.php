@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Update informasi mobil
                </div>
            </div>
            <div class="card-body"> 
            <form action="{{ route('car.update', $car->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                <label for="">Jenis mobil</label>
                <input type="text" class="form-control" name="jenis_mobil" value="{{ $car->jenis_mobil }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Nama mobil</label>
                    <input type="text" class="form-control" name="nama_mobil" value="{{ $car->nama_mobil }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Merk mobil</label>
                    <input type="text" class="form-control" name="merk_mobil" value="{{ $car->merk_mobil }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Bahan bakar</label>
                    <input type="text" class="form-control" name="bahan_bakar" value="{{ $car->bahan_bakar }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Harga sewa</label>
                    <input type="text" class="form-control" name="harga" value="{{ $car->harga }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control-file" name="gambar" value="{{ $car->gambar }}" placeholder="" >
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-upload    "></i> Update
                </button>
                <a href="{{ route('car.index') }}" type="button" class="btn btn-secondary">
                    <i class="fas fa-arrow-left    "></i>
                    Cancel
                </a>
            </form>
            </div>
        </div>
    </div>
</div>
@stop
