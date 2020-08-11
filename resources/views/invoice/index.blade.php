@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header d-flex flex-wrap border-bottom-0">
                <h4 class="card-title text-bold align-self-center">
                    Invoice data
                </h4> 
            </div>
            <div class="card-body">
                @livewire('invoice-table') 
            </div>
        </div>       
    </div>
</div>

@endsection