<!-- Modal -->
<div class="modal fade" id="driver" tabindex="-1" role="dialog" aria-labelledby="driver" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header border-bottom-0">
				<h5 class="modal-title">Tambah driver</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<form action="{{ route("driver.store") }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
					    <label for="driver_name">Nama driver</label>
					    <input type="text" class="form-control" name="driver_name">
					</div>
					<div class="form-group">
					    <label for="driver_age">Umur driver</label>
					    <input type="text" class="form-control" name="driver_age">
					</div>
					<div class="form-group">
					    <label for="driver_phone">Nomor telepon</label>
					    <input class="form-control" type="text" name="driver_phone">
					</div>
					<div class="form-group">
					    <label for="driver_address">Alamat driver</label>
					    <textarea class="form-control" name="driver_address"></textarea>
					</div>
					<button class="btn btn-primary" type="submit">Tambahkan</button>
				</form>
			</div>
		</div>
	</div>
</div>