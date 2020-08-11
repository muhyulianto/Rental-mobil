@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-stretch mt-5">
        <div class="col-lg-4 mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0">
                    <div class="card-title">Informasi mobil</div>
                </div>
                <div class="card-body">
                    <img class="img-fluid mb-3" src="{{ asset('storage/images/'.$cars->image) }}" alt="gambar_mobil">
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-muted w-50">Jenis mobil</td>
                            <th class="text-right">{{ $cars->type }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Car Name</td>
                            <th class="text-right">{{ $cars->name }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Merk mobil</td>
                            <th class="text-right">{{ $cars->brand }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Bahan bakar</td>
                            <th class="text-right">{{ $cars->fuel }}</th>
                        </tr>
                        <tr>
                            <td class="text-muted w-50">Harga</td>
                            <th class="text-right">{{ $cars->format_price }} / hari</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0">
                    <div class="card-title">Pemesanan</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('rentUser.store') }}" method="post" id="store_rent">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $cars->id }}">
                        <input type="hidden" name="customer_id" value="{{ empty($user->customers) ? "" : $user->customers->id }}">
                        <div class="form-group">
                            <label for="customer_id">Data diri</label>
                            <input type="text" class="form-control" id="customer_id" disabled value="{{ empty($user->customers) ? '' : $user->customers->name }}">
                            @empty($user->customers)
                            <small id="helpId" class="form-text text-danger">
                                Anda belum melengkapi data diri anda silahkan lengkapi data anda terlebih dahulu
                                <a href="{{ route('CustomerUser.create') }}"> disini!</a>
                            </small>
                            @endempty
                        </div>
                        <div class="form-group">
                            <label for="services_type">Services Type</label>
                            <select class="form-control pointer" name="services_type" id="services_type" required>
                                <option disabled {{ (old('services_type') ? '' : 'selected')}}></option>
                                <option value="1" {{ (old('services_type') == '1' ? 'selected' : '')}}>Hanya mobil</option>
                                <option value="2" {{ (old('services_type') == '2' ? 'selected' : '')}}>Mobil dan sopir</option>
                                <option value="3" {{ (old('services_type') == '3' ? 'selected' : '')}}>Mobil, sopir dan bahan bakar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Start date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="form-control pointer" min="2020-04-21" required>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="duration" id="duration" value="{{ old('duration') }}" autocomplete="off" required>
                                <div class="input-group-append">
                                    <label class="input-group-text">Hari</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="pickup_location">
                            <label for="pickup_location">Lokasi penjemputan</label>
                            <textarea name="pickup_location" class="form-control">{{ old('pickup_location') }}</textarea>
                            <small id="helpId" class="text-muted">Lokasi penjemputan jika anda menyewa sopir</small>
                        </div>
                        <div class="form-group">
                            <label for="price">Estimasi price</label>
                            <div class="input-group">
                                <input name="price" id="price" class="form-control" value="{{ session()->get('price') }}" disabled>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" name="cek" type="submit" value="0" id="cek_estimasi">
                                        Cek price
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button name="create" value="1" type="submit" class="btn btn-primary mt-3">
                            <i class="fa fa-shopping-cart text-white" aria-hidden="true"></i>
                            Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
