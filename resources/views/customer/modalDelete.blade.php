<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body text-left">
                Apa anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="{{ route('customer.destroy', $customer->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary" type="submit">
                        Ya, Hapus!
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>