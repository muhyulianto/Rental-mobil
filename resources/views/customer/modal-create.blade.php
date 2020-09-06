<!-- Modal -->
<div class="modal fade" id="createCustomer" tabindex="-1" role="dialog" aria-labelledby="tambahCustomerBaru" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Add new customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="id_card_number">ID Card Number</label>
                        <input type="text" name="id_card_number" id="id_card_number" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>