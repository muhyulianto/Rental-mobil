@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Edit car data
                </div>
            </div>
            <div class="card-body"> 
            <form action="{{ route('car.update', $car->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" value="{{ $car->type }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $car->name }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" value="{{ $car->brand }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="fuel">Fuel</label>
                    <input type="text" class="form-control" name="fuel" value="{{ $car->fuel }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" value="{{ $car->price }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" name="image" value="{{ $car->image }}">
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
