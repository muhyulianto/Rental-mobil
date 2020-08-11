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
                        <label for="name">Nama lengkap</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="namaLengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="id_card_number">Nomor ktp</label>
                        <input type="text" name="id_card_number" id="id_card_number" class="form-control" placeholder="" aria-describedby="nomorKtp" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor telepon</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="" aria-describedby="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat lengkap</label>
                        <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Tamabah data</button>
                </form>
            </div>
        </div>
    </div>
</div>