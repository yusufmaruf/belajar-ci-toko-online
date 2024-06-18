<div class="col-md-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<h3 class="card-title">Data barang</h3>

		<div class="card-tools">
			<a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-primary"  >
				<i class="fas fa-plus"></i> Add
			</a>
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
						<th>Nama barang</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Gambar</th>

						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($barang as $key => $value) { ?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= $value->nama_barang ?></td>
						<td><?= $value->nama_kategori ?></td>
						<td>Rp. <?= number_format($value->harga,0,',','.') ?></td>
						<td><img src="<?= base_url('asset/gambar/'.$value->gambar) ?>" width="100px"></td>
						<td>
							<a href="<?= base_url('barang/edit/'.$value->id_barang) ?>" class="btn btn-warning btn-sm" >
								<i class="fas fa-edit"></i>
							</a>
							<button href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_barang ?>">
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
<?php foreach ($barang as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_barang ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete <?= $value->nama_barang ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<p>Apakah anda yakin ingin menghapus data ini?</p>

				
			</div>
			<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="<?= base_url('barang/delete/'.$value->id_barang) ?>" type="submit" class="btn btn-danger">Delete</a>
			</div>
			

		<!-- /.modal-content -->
		</div>
	<!-- /.modal-dialog -->
	</div>
</div>

<?php } ?>
