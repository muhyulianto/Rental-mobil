@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex flex-wrap border-bottom-0">
                <h4 class="card-title text-bold align-self-end mr-2">Rent list</h4> 
                <a class="btn btn-primary btn-sm" href="{{ route('rents.create') }}" role="button">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="card-body">
                @livewire('rent-table')
            </div>
        </div>
    </div>
</div>
@endsection