<!-- Modal -->
<div class="modal fade" id="armada" tabindex="-1" role="dialog" aria-labelledby="armada" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <div class="modal-title font-weight-bold">Tambah armada</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route("armada.store") }}" method="post">
                    <div class="form-group">
                        <label for="car_id">Mobil</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="5" title=". . ." name="car_id" id="car_id">
                            <option selected disabled></option>
                            @foreach ($cars as $car)
                            <option value="{{ $car->id }}">
                                {{ $car->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="license_plate">Nomor plat</label>
                        <input type="text" name="license_plate" id="license_plate" class="form-control" placeholder="" aria-describedby="license_plate_help" autocomplete="off" required>
                        <small id="license_plate_help" class="text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
