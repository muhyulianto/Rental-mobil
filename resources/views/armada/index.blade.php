@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header d-flex flex-wrap align-items-center border-bottom-0">
                <h4 class="card-title text-bold mr-2">
                    Armada list
                </h4> 
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#armada">
                    <span class="fa fa-plus"></span>
                </button>
            </div>
            <div class="card-body">
                @livewire('armada-table')
            </div>
        </div>
    </div>
    @include('armada.modal-create')
</div>
@endsection