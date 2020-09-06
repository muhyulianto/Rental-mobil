@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Edit Customer Data
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('customer.update', $customer->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required autocomplete="off" value="{{ $customer->name }}">
                    </div>
                    <div class="form-group">
                        <label for="id_card_number">ID Card Number</label>
                        <input type="text" name="id_card_number" id="id_card_number" class="form-control" required autocomplete="off" value="{{ $customer->id_card_number }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" required autocomplete="off" value="{{ $customer->name }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control" required>{{ $customer->address }}</textarea>
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