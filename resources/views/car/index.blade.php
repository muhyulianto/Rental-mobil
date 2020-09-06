@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header d-flex flex-wrap align-items-center border-bottom-0">
                <h4 class="card-title text-bold mr-2">Car Data</h4> 
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mobil">
                    <span class="fa fa-plus"></span>
                </button>
            </div>
            <div class="card-body">
                @livewire('car-table')
            </div>
        </div>
    </div>
    @include('car.modal-create')
</div>
@endsection
