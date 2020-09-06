<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body text-left">
                Are you sure want to delete this data?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form action="{{ route("driver.destroy", $driver->id) }}" method="post" class="d-inline">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-primary">
                        Yes! delete.
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>