@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header d-flex flex-wrap border-bottom-0">
                <h4 class="card-title text-bold align-self-center mr-2">
                    Driver list
                </h4> 
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#driver">
                    <i class="fas fa-plus    "></i>
                </button>
            </div>
            <div class="card-body">
                @livewire('driver-table')
            </div>
        </div>
    </div>
</div>

@include('driver.modal-create')
@endsection