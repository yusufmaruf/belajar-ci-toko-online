<div class="col-md-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<h3 class="card-title">Data Gambar barang</h3>

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
						<th>Cover</th>
						<th>Jumlah Gambar</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($gambarbarang as $key => $value) { ?>
						<tr>
							<td><?= $key+1 ?></td>
							<td><?= $value->nama_barang ?></td>
							<td>
								<img src="<?= base_url('asset/gambar/'.$value->gambar) ?>" width="100px">
							</td>
							<td><?= $value->total_gambar ?></td>
							<td>
								<a href="<?= base_url('gambarbarang/add/'.$value->id_barang) ?>" class="btn btn-success btn-sm"><i class="fas fa-plus">Tambah Gambar</i></a>
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

