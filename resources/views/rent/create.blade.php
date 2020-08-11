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
				<form action="{{ route('store_rent_admin') }}" method="post" id="store_rent">
					@csrf
					<div class="form-group">
						<label for="user_id">Pilih customer</label>
						<select class="form-control selectpicker" name="customer_id" data-size="5" data-live-search="true" title=". . ." required>
							<option disabled {{ (old('customer_id') ? '' : 'selected')}}></option>
							@forelse ($customers as $customer)
							<option value="{{ $customer->id }}" {{ (old('customer_id') == $customer->id ? 'selected' : '')}}>
								{{ $customer->name }}
							</option> 
							@empty
							@endforelse
						</select>
					</div>
					<div class="form-group">
						<small>
							Atau buat data customer baru <a href="#" data-toggle="modal" data-target="#createCustomer" class="text-primary">Di sisni!</a>
						</small>
					</div>
					<div class="form-group">
						<label for="car_id">Pilih mobil</label>
						<select class="form-control selectpicker" name="car_id" data-size="5" data-live-search="true" title=". . ." required>
                            <option disabled {{ (old('car_id') ? '' : 'selected')}}></option>
							@foreach ($cars as $car)
								<option value="{{ $car->id }}" {{ (old('car_id') == $car->id ? 'selected' : '')}}>
									{{ $car->nama_lengkap_mobil }}
								</option> 
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="services_type">Services Type</label>
						<select class="form-control selectpicker" id="services_type" name="services_type" data-size="5" data-live-search="true" title=". . ." required>
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
							<input type="number" class="form-control" name="duration" id="duration" value="{{ old('duration') }}" min="0" autocomplete="off" required>
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
						Buat pesanan
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
@include('customer.create')
@endsection