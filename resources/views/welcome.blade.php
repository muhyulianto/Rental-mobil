@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center" style="min-height: 100vh">
        <div class="col-lg-6">
            <h1>
                LOREM IPSUM DOLOR SIT AMET
            </h1>
            <div class="description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores recusandae dolorem sit voluptas accusantium, facilis sequi illum totam. Illum eos pariatur architecto eveniet et! Doloribus blanditiis suscipit eligendi tenetur ullam!
            </div>
            <button type="button" class="btn btn-primary d-block mt-3">
                Mulai sewa
            </button>
        </div>
        <div class="col-lg-6">
        <img src="{{ asset('images/main.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        </div>
    </div>
</div>
@endsection
