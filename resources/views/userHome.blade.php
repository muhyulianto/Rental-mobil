@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-end">
        @foreach ($cars as $car)
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <img src="{{ asset('storage/images/'.$car->image) }}" alt="gambar_mobil" class="card-img-top">
                <div class="card-body d-flex">
                    <div class="d-flex flex-column w-50">
                        <div class="text-muted">
                            {{ $car->brand }} {{ $car->name }}
                        </div>
                        <span class="text-muted font-weight-bold">
                            Rp.{{ $car->price }},-
                        </span>
                    </div>
                    <a href="{{ route('rentUser.create', $car->id) }}" type="button" class="btn btn-success align-self-center ml-auto">
                        <i class="fas fa-shopping-basket    "></i>
                        <span class="text-white"> Pesan</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
