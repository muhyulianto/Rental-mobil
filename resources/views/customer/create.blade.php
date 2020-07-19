<!-- Modal -->
<div class="modal fade" id="createCustomer" tabindex="-1" role="dialog" aria-labelledby="tambahCustomerBaru" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Tambah customer baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="namaLengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_ktp">Nomor ktp</label>
                        <input type="text" name="nomor_ktp" id="nomor_ktp" class="form-control" placeholder="" aria-describedby="nomorKtp" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_telepon">Nomor telepon</label>
                        <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" placeholder="" aria-describedby="nomorTelepone">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat lengkap</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Tamabah data</button>
                </form>
            </div>
        </div>
    </div>
</div>