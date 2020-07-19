<!-- Modal -->
<div class="modal fade" id="mobil" tabindex="-1" role="dialog" aria-labelledby="mobil" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Tambah mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('car.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label for="">Tipe mobil</label>
                            <input type="text" class="form-control" name="jenis_mobil" id="" aria-describedby="helpId" placeholder="" required>
                            <small class="text-muted">
                                Contoh: MPV, Sedan dll.
                            </small>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="">Merk mobil</label>
                            <input type="text" class="form-control" name="merk_mobil" id="" aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="">Nama mobil</label>
                            <input type="text" class="form-control" name="nama_mobil" id="" aria-describedby="helpId" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Bahan bakar</label>
                        <input type="text" class="form-control" name="bahan_bakar" id="" aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Harga sewa</label>
                        <input type="number" class="form-control" name="harga" id="" aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar mobil</label>
                        <input type="file" name="gambar" class="form-control-file" id="gambar">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>