@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Buat penyewaan
                </div>
            </div>
            <div class="card-body">
                @livewire('check-price')
            </div>
        </div>
    </div>
</div>
@include('customer.modal-create')
@endsection