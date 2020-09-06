<!-- Modal -->
<div class="modal fade" id="mobil" tabindex="-1" role="dialog" aria-labelledby="mobil" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Add car data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('car.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" autocomplete="off" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" name="brand" autocomplete="off" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fuel">Fuel</label>
                        <input type="text" class="form-control" name="fuel" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" min="0" class="form-control" name="price" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Car Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>