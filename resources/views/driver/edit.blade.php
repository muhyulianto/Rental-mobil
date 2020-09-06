@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Edit driver data
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route("driver.update", $driver->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $driver->name }}" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" min="20" max="40" class="form-control" name="age" value="{{ $driver->age }}" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input class="form-control" type="text" name="phone_number" value="{{ $driver->phone_number }}" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" required>{{ $driver->address }}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">
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