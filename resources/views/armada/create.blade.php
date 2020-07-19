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
                        <label for="id_mobil">Mobil</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="5" title=". . ." name="id_mobil" id="id_mobil">
                            <option selected disabled></option>
                            @foreach ($cars as $car)
                            <option value="{{ $car->id }}">
                                {{ $car->nama_mobil }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomor_plat">Nomor plat</label>
                        <input type="text" name="nomor_plat" id="nomor_plat" class="form-control" placeholder="" aria-describedby="nomor_plat_help" autocomplete="off" required>
                        <small id="nomor_plat_help" class="text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
