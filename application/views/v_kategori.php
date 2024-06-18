<div class="col-md-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<h3 class="card-title">Data Kategori</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add" >
			<i class="fas fa-plus"></i> Add
			</button>
		</div>
		<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php if($this->session->flashdata('pesan')){
				echo '<div class="alert alert-success alert-dismissible">';
				echo $this->session->flashdata('pesan');
				echo "</div>";
			}; ?>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>

						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($kategori as $key => $value) { ?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= $value->nama_kategori ?></td>
						<td>
							<button href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>" >
								<i class="fas fa-edit"></i>
							</button>
							<button href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_kategori ?>">
								<i class="fas fa-trash"></i>
							</button>
						</td>

					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
<!-- /.card -->
</div>
<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Add Kategori</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<?php echo form_open('kategori/add'); ?>
				<div class="form-group">
					<label for="nama_user">Nama Kategori</label>
					<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
				</div>
		</div>
		<div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
		</div>
		</div>
			<?php echo form_close(); ?>

		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<?php foreach ($kategori as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->id_kategori ?>">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit Kategori</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<?php echo form_open('kategori/edit/'.$value->id_kategori.''); ?>
				<div class="form-group">
					<label for="nama_user">Nama User</label>
					<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $value->nama_kategori ?>" required>
				</div>
		</div>
		<div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
		</div>
		</div>
			<?php echo form_close(); ?>

		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php } ?>

<?php foreach ($kategori as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_kategori ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete <?= $value->nama_kategori ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<p>Apakah anda yakin ingin menghapus data ini?</p>

				
			</div>
			<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="<?= base_url('kategori/delete/'.$value->id_kategori) ?>" type="submit" class="btn btn-danger">Delete</a>
			</div>
			

		<!-- /.modal-content -->
		</div>
	<!-- /.modal-dialog -->
	</div>
</div>

<?php } ?>
<!-- modal edit  -->
