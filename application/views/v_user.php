<div class="col-md-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<h3 class="card-title">Data User</h3>

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
						<th>Nama User</th>
						<th>Username</th>
						<th>Password</th>
						<th>Level User</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($user as $key => $value) { ?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= $value->nama_user ?></td>
						<td><?= $value->username ?></td>
						<td><?= $value->password ?></td>
						<td><?php if($value->level_user == 1){echo "<span class='badge badge-success'>Admin</span>";}else{echo "<span class='badge badge-warning'>User</span>";} ?></td>
						<td>
							<button href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_user ?>" >
								<i class="fas fa-edit"></i>
							</button>
							<button href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_user ?>">
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
			<h4 class="modal-title">Add User</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<?php echo form_open('user/add'); ?>
				<div class="form-group">
					<label for="nama_user">Nama User</label>
					<input type="text" class="form-control" id="nama_user" name="nama_user" required>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" required>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="">Level</label>
					<select name="level_user" id="" class="form-control">
						<option value="1" selected>Admin</option>
						<option value="2">User</option>
					</select>
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

<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->id_user ?>">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit User</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<?php echo form_open('user/edit/'.$value->id_user.''); ?>
				<div class="form-group">
					<label for="nama_user">Nama User</label>
					<input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $value->nama_user ?>" required>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" value="<?= $value->username ?>" required>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="text" name="password" id="password" value="<?= $value->password ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="">Level</label>
					<select name="level_user" id="" class="form-control">
						<option value="1" <?= $value->level_user == 1 ? 'selected' : '' ?>>Admin</option>
						<option value="2" <?= $value->level_user == 2 ? 'selected' : '' ?>>User</option>
					</select>
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

<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_user ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete <?= $value->nama_user ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<p>Apakah anda yakin ingin menghapus data ini?</p>

				
			</div>
			<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="<?= base_url('user/delete/'.$value->id_user) ?>" type="submit" class="btn btn-danger">Delete</a>
			</div>
			

		<!-- /.modal-content -->
		</div>
	<!-- /.modal-dialog -->
	</div>
</div>

<?php } ?>
<!-- modal edit  -->
