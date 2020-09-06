<!-- Modal -->
<div class="modal fade" id="driver" tabindex="-1" role="dialog" aria-labelledby="driver" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header border-bottom-0">
				<h5 class="modal-title">Add driver</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<form action="{{ route("driver.store") }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" class="form-control" name="name" autocomplete="off" required>
					</div>
					<div class="form-group">
					    <label for="age">Age</label>
					    <input type="number" min="20" max="40" class="form-control" name="age" autocomplete="off" required>
					</div>
					<div class="form-group">
					    <label for="phone_number">Phone Number</label>
					    <input class="form-control" type="text" name="phone_number" autocomplete="off" required>
					</div>
					<div class="form-group">
					    <label for="address">Address</label>
					    <textarea class="form-control" name="address" required></textarea>
					</div>
					<button class="btn btn-primary" type="submit">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>