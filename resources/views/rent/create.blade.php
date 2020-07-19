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
						<label for="id_user">Pilih customer</label>
						<select class="form-control selectpicker" name="id_customer" data-size="5" data-live-search="true" title=". . ." required>
							<option disabled {{ (old('id_customer') ? '' : 'selected')}}></option>
							@forelse ($customers as $customer)
							<option value="{{ $customer->id }}" {{ (old('id_customer') == $customer->id ? 'selected' : '')}}>
								{{ $customer->nama }}
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
						<label for="id_mobil">Pilih mobil</label>
						<select class="form-control selectpicker" name="id_mobil" data-size="5" data-live-search="true" title=". . ." required>
                            <option disabled {{ (old('id_mobil') ? '' : 'selected')}}></option>
							@foreach ($cars as $car)
								<option value="{{ $car->id }}" {{ (old('id_mobil') == $car->id ? 'selected' : '')}}>
									{{ $car->nama_lengkap_mobil }}
								</option> 
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="tipe_peminjaman">Tipe peminjaman</label>
						<select class="form-control selectpicker" id="tipe_peminjaman" name="tipe_peminjaman" data-size="5" data-live-search="true" title=". . ." required>
							<option disabled {{ (old('tipe_peminjaman') ? '' : 'selected')}}></option>
							<option value="1" {{ (old('tipe_peminjaman') == '1' ? 'selected' : '')}}>Hanya mobil</option>
							<option value="2" {{ (old('tipe_peminjaman') == '2' ? 'selected' : '')}}>Mobil dan sopir</option>
							<option value="3" {{ (old('tipe_peminjaman') == '3' ? 'selected' : '')}}>Mobil, sopir dan bahan bakar</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Mulai sewa</label>
						<input type="date" id="mulai_sewa" name="mulai_sewa" value="{{ old('mulai_sewa') }}" class="form-control pointer" min="2020-04-21" required>
					</div>
					<div class="form-group">
						<label for="lama_sewa">Lama sewa</label>
						<div class="input-group">
							<input type="number" class="form-control" name="lama_sewa" id="lama_sewa" value="{{ old('lama_sewa') }}" min="0" autocomplete="off" required>
							<div class="input-group-append">
								<label class="input-group-text">Hari</label>
							</div>
						</div>
					</div>
					<div class="form-group" id="lokasi_penjemputan">
						<label for="lokasi_penjemputan">Lokasi penjemputan</label>
						<textarea name="lokasi_penjemputan" class="form-control">{{ old('lokasi_penjemputan') }}</textarea>
						<small id="helpId" class="text-muted">Lokasi penjemputan jika anda menyewa sopir</small>
					</div>
					<div class="form-group">
						<label for="harga">Estimasi harga</label>
						<div class="input-group">
							<input name="harga" id="harga" class="form-control" value="{{ session()->get('harga') }}" disabled>
							<div class="input-group-append">
								<button class="btn btn-primary" name="cek" type="submit" value="0" id="cek_estimasi">
									Cek harga
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