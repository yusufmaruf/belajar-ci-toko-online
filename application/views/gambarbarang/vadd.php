<div class="col-md-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<h3 class="card-title">Add Gambar barang : <?= $barang->nama_barang ?></h3>

		<div class="card-tools">
			
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
			<?php 
			echo validation_errors('<div class="alert alert-danger alert-dismissible">','</div>');
			if(isset($error_upload)){
				echo '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> Alert!</h5>'.$error_upload.'
				</div>';
			}  ?>
			<?= form_open_multipart('gambarbarang/add/'.$barang->id_barang); ?>
			
				<div class="form-group">
					<label>Keterangan Gambar</label>
					<input type="text" class="form-control" name="ket" class="form-control" placeholder="Keterangan Gambar ..." value="<?= set_value('ket') ?>">
                </div>
				<div class="row">
					<div class=" col-md-6">
						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="gambar" class="form-control" id="preview_gambar">
						</div>
					</div>
					<div class=" col-md-6">
						<div class="form-group">
							<img src="<?= base_url('asset/gambar/frame-1.png') ?>" alt="" id="preview" width="150px">
					</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
					<a href="<?= base_url('gambarbarang') ?>" class="btn btn-success btn-sm">Kembali</a>
				</div>
			<?php echo form_close(); ?>
			<hr>
			<div class="row">
				<?php foreach ($gambar as $key => $value) { ?>
					<div class="col-sm-3">
						<div class="text-center">
							<img src="<?= base_url('asset/gambar/'.$value->gambar); ?>" alt="" width="200px">
							<h5><?= $value->ket ?></h5>
							<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>"><i class="fas fa-trash"></i> Hapus</button>
						</div>
						
					</div>
				<?php } ?>
			</div>
			
		</div>

		
		<!-- /.card-body -->
	</div>
<!-- /.card -->
</div>



<script>
	$(document).ready(function(){
		function bacaGambar(input){
			if(input.files && input.files[0]){
				var reader = new FileReader();
				reader.onload = function(e){
					$('#preview').attr('src',e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
				
			}
				
		}
		$('#preview_gambar').change(function(){
			bacaGambar(this);
		})
	});
</script>
<?php foreach ($gambar as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_gambar ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete <?= $value->ket ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<p>Apakah anda yakin ingin menghapus data ini?</p>

				
			</div>
			<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="<?= base_url('gambarbarang/delete/'.$value->id_gambar) ?>" type="submit" class="btn btn-danger">Delete</a>
			</div>
			

		<!-- /.modal-content -->
		</div>
	<!-- /.modal-dialog -->
	</div>
</div>

<?php } ?>
