<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">form Add Barang</h3>
		</div>
			<!-- /.card-header -->
		<div class="card-body">
			<?php 
			echo validation_errors('<div class="alert alert-danger alert-dismissible">','</div>');
			if(isset($error_upload)){
				echo '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> Alert!</h5>'.$error_upload.'
				</div>';
			}
			echo form_open_multipart('barang/add'); ?>
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" class="form-control" name="nama_barang" class="form-control" placeholder="Nama Barang ..." value="<?= set_value('nama_barang') ?>">
                </div>
				<div class="form-group">
					<label>Kategori</label>
					<select name="id_kategori" class="form-control" id="">
						<option value="">--Pilih Kategori--</option>
						<?php foreach ($kategori as $key => $value) { ?>
							<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
						<?php } ?>
					</select>
                </div>
				<div class="form-group">
					<label>Harga</label>
					<input type="number" class="form-control" name="harga" class="form-control" value="<?= set_value('harga') ?>">
                </div>
				<div class="form-group">
					<label for="">Deskripsi</label>
					<textarea name="deskripsi" class="form-control" id="" cols="30" rows="5"><?= set_value('deskripsi') ?></textarea>
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
					<a href="<?= base_url('barang') ?>" class="btn btn-success btn-sm">Kembali</a>
				</div>
             

			<?php form_close(); ?>
		</div>
	</div>
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
