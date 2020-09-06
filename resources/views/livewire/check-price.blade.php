<div>
    <form action="{{ route('rents.store') }}" method="post" id="store_rent">
        @csrf
        <div class="form-group" wire:ignore>
            <label for="user_id">Pilih customer</label>
            <select class="form-control selectpicker" name="customer_id" data-size="5" data-live-search="true" title=". . ." required>
                @forelse ($customers as $customer)
                <option value="{{ $customer->id }}">
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
            <div wire:ignore>
                <select class="form-control selectpicker" name="car_id" data-size="5" data-live-search="true" title=". . ." wire:model="car" required>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">
                            {{ $car->car_full_name }}
                        </option> 
                    @endforeach
                </select>
            </div>
            @error('car')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="form-group">
            <label for="services_type">Services Type</label>
            <select class="form-control" id="services_type" name="services_type" wire:model="servicesType" required>
                <option disabled selected></option>
                <option value="1">Hanya mobil</option>
                <option value="2">Mobil dan sopir</option>
                <option value="3">Mobil, sopir dan bahan bakar</option>
            </select>
            @error('servicesType')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Start date</label>
            <input type="date" id="start_date" name="start_date" class="form-control pointer" required>
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <div class="input-group">
                <input type="number" class="form-control" name="duration" id="duration" min="0" autocomplete="off" wire:model="duration" required>
                <div class="input-group-append">
                    <label class="input-group-text">Hari</label>
                </div>
            </div>
            @error('duration')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group" id="pickup_location" wire:ignore>
            <label for="pickup_location">Lokasi penjemputan</label>
            <textarea name="pickup_location" class="form-control">{{ old('pickup_location') }}</textarea>
            <small id="helpId" class="text-muted">Lokasi penjemputan jika anda menyewa sopir</small>
        </div>
        <div class="form-group">
        <label for="price">Estimated Price</label>
        <div class="input-group">
            <input type="text" name="price" id="price" class="form-control" wire:model="estimatedPrice" disabled>
            <div class="input-group-append">
                <button type="button" class="btn btn-primary" wire:click="checkPrice()">check</button>
            </div>
        </div>
        </div>
        <button name="create" value="1" type="submit" class="btn btn-primary mt-3">
            <i class="fa fa-shopping-cart text-white" aria-hidden="true"></i>
            Buat pesanan
        </button>
    </form>
</div>
