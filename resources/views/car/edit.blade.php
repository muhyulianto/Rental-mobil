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
                <input type="text" class="form-control" name="type" value="{{ $car->type }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Car Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $car->name }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Merk mobil</label>
                    <input type="text" class="form-control" name="brand" value="{{ $car->brand }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Bahan bakar</label>
                    <input type="text" class="form-control" name="fuel" value="{{ $car->fuel }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Harga sewa</label>
                    <input type="text" class="form-control" name="price" value="{{ $car->price }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control-file" name="image" value="{{ $car->image }}" placeholder="" >
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
