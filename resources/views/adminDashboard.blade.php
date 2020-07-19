@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card border-0">
            <div class="card-header">
                <i class="fas fa-bell    "></i>
                Notifikasi
            </div>
            <div class="card-body">
                @foreach ($notifications as $notif)
                    <div class="alert alert-warning" role="alert">
                        {{ $notif->data['pesan'] }}
                        <form action="{{ route('readNotification', $notif->id) }}" method="post" class="d-inline-block">
                            @csrf
                            <input type="hidden" name="id_payment" value="{{ $notif->data['data']['id'] }}">
                            <button class="btn btn-link text-primary p-0" type="submit">Disini!</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
