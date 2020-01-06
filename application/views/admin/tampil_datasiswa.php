<div class="row">

</div>

<?php $info = $this->session->flashdata('info');
if (!empty($info)) { ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $info; ?>
	</div>
<?php }
?>

<header class="panel-heading">
	<div class="panel-actions">
		<a href="#" class="fa fa-caret-down"></a>
		<a href="#" class="fa fa-times"></a>
	</div>
	<h2 class="panel-title">Tabel Data Siswa</h2>
</header>


<div class="panel-body">
	<!-- <p> <button type="button" class="btn btn-warning">DATA YANG DI MASUKKAN TELAH ADA</button>
	</p> -->

	<p>
		<button class="btn btn-oval btn-success" data-toggle="modal" data-target="#exampleModal">
			<i class="glyphicon glyphicon-plus"></i>Tambah
		</button>
	</p>
	<table class="table table-bordered table-striped mb-none" id="datatable">

		<thead>
		<tr>
			<th>No</th>
			<th>Foto</th>
			<th>NIS</th>
			<th>Nama Lengkap</th>
			<th>Kode Kelas</th>
			<th>Tahun Ajaran</th>
			<th>Jenis Kelamin</th>
			<th>Telp.</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
			<th>Verifikasi</th>
			<th>Aksi</th>
		</tr>
		</thead>

		<tbody>
		<tr>
			<?php
			$no = 1;
			foreach ($data->result() as $row) {
			?>

			<td><?php echo $no++; ?></td>
			<td>
				<img height="35"
					 src="<?php echo base_url('uploads/fotosiswa/') ?><?php echo $row->fotosiswa; ?>"
					 alt="No Img" class="online">
			</td>
			<td><?php echo $row->nis; ?></td>
			<td><?php echo $row->nama_siswa; ?></td>
			<td><?php echo $row->kode_kelas; ?></td>
			
			<td><?php echo $row->tahun_ajaran; ?></td>
			<td><?php echo $row->jenis_kelamin; ?></td>
			<td><?php echo $row->telpon; ?></td>
			<td><?php echo date_indo($row->tanggal_lahir); ?></td>
			<td><?php echo $row->alamat; ?></td>
			<td><?php
				if ($row->Verifikasi == null) {
					echo "Belum";
				} else {
					echo $row->Verifikasi;
				} ?></td>

			<td>
				<button class="btn btn-floating btn-primary" data-toggle="modal"
						data-target="#exampleModal<?php echo $row->id_siswa; ?>"><i
						class="fa fa-pencil"></i></button>
				<div class="modal fade" id="exampleModal<?php echo $row->id_siswa; ?>" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<header class="panel-heading">
								<h2 class="panel-title">Ubah Siswa</h2>
							</header>

							<div class="panel-body form">
								<form class="form-horizontal mb-lg" enctype="multipart/form-data" method="post"
									  action="<?php echo site_url('siswa/ubah') ?>">

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">NIS</label>
										<div class="col-sm-5">
											<input type="number" name="nis" value="<?php echo $row->nis; ?>" id="npm"
												   placeholder="NIS" class="form-control">
											<input type="hidden" name="id_siswa_lama"
												   value="<?php echo $row->id_siswa; ?>"
												   id="id_siswa_lama" class="form-control">
											<input type="hidden" name="nis_lama" value="<?php echo $row->nis; ?>"
												   id="npm"
												   placeholder="NIS" class="form-control">
										</div>
									</div>

									<div class="form-group mt-lg">
										<label class="col-sm-3 control-label no-padding-right">Kelas</label>
										<div class="col-sm-9">
											<select class="select2-nama-siswa" name="id_kelas" id="exampleFormControlSelect1">
												<?php foreach ($data_kelas->result() as $kelas): ?>
													<option value="<?php echo $kelas->id_kelas; ?>" <?php if($kelas->id_kelas === $row->id_kelas ) {
														echo "selected";
													} ?>>
														<?php echo $kelas->kode_kelas ; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Tahun
											ajaran</label>
										<div class="col-sm-5">
											<select class="form-control" name="tahun_ajaran">
												<?php
												$thn_skr = date('Y');
												for ($x = 2010; $x <= $thn_skr; $x++) {
													echo "<option value='$x'>$x</option>";
												}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Nama Siswa</label>
										<div class="col-sm-8">
											<input type="text" value="<?php echo $row->nama_siswa; ?>" name="nama_siswa"
												   id="namamhs"
												   placeholder="Nama Siswa" class="form-control">
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Jenis Kelamin</label>
										<div class="col-sm-8">
											<select class="form-control" name="jenis_kelamin"
													id="exampleFormControlSelect1">
												<option
													value="Laki-Laki" <?php if ($row->jenis_kelamin == "Laki-Laki") {
													echo "selected";
												} ?>>Laki-Laki
												</option>
												<option
													value="Perempuan" <?php if ($row->jenis_kelamin == "Perempuan") {
													echo "selected";
												} ?>>Perempuan
												</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Tgl Lahir</label>
										<div class="col-sm-8">
											<input type="date" value="<?php echo $row->tanggal_lahir; ?>"
												   name="tanggal_lahir" id="tgl_lahir"
												   placeholder="Tanggal Lahir" class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Telp.</label>
										<div class="col-sm-5">
											<input type="number" value="<?php echo $row->telpon; ?>" name="telepon"
												   id="fakulmhs" placeholder="Telpon"
												   class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Password Akun</label>
										<div class="col-sm-5">
											<input type="password" name="passmhs" id="passmhs" placeholder="Password"
												   class="form-control" value="<?php echo $row->pw_siswa; ?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat</label>
										<div class="col-sm-9">
					<textarea name="alamat" id="alamatmhs" rows="5"
							  title="Your resume is too short." class="form-control"
							  placeholder="Masukkan Alamat" required> <?php echo $row->alamat; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Foto</label>
										<div class="col-sm-4">
											<input type="file" name="foto1" id="fakulmhs" placeholder="file"
												   class="form-control">
										</div>
										<img height="35"
											 src="<?php echo base_url('uploads/fotosiswa/') ?><?php echo $row->fotosiswa; ?>"
											 alt="No Img" class="online">
									</div>

									<div class="modal-footer">
										<button type="sumbit" class="btn btn-primary">Ubah</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal
										</button>
								</form>
							</div>
						</div>
					</div>
				</div>
</div>

	<a href="<?php echo base_url() ?>index.php/siswa/hapus/<?php echo $row->id_siswa; ?>"
	   class="btn btn-floating btn-danger"><i class="fa fa-trash-o"></i></a>


	<a href="<?php echo base_url() ?>index.php/siswa/Verifikasi/<?php echo $row->id_siswa; ?>
			<?php

	if ($row->Verifikasi == "Belum" || $row->Verifikasi == null) {
		echo "/1";
	} else {
		echo "/2";
	}
	?>" class="btn btn-floating btn-info"> <i class="<?php

		if ($row->Verifikasi == "Belum" || $row->Verifikasi == null) {
			echo "fa fa-check";
		} else {
			echo "fa fa-times";
		}
		?>" aria-hidden="true"></i></a>

	</td>
	</tr>
<?php } ?>
</tbody>
</table>
<!-- end: page -->


<div class="modal fade" id="exampleModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<header class="panel-heading">
				<h2 class="panel-title">Tambah Siswa</h2>
			</header>

			<div class="panel-body form">
				<form class="form-horizontal mb-lg" enctype="multipart/form-data" method="post"
					  action="<?php echo site_url('siswa/simpan') ?>">
					<div class="form-group">
						<label class="col-md-3 control-label no-padding-right">NIS</label>
						<div class="col-sm-5">
							<input type="number" name="nis" id="npm" placeholder="NIS" class="form-control"
								   required>
						</div>
					</div>

					<div class="form-group mt-lg">
						<label class="col-sm-3 control-label no-padding-right">Kelas</label>
						<div class="col-sm-9">
							<select class="select2-nama-siswa" name="id_kelas" id="exampleFormControlSelect1">
								<?php foreach ($data_kelas->result() as $row): ?>
									<option value="<?php echo $row->id_kelas; ?>">
										<?php echo $row->kode_kelas ; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Tahun
							ajaran</label>
						<div class="col-sm-5">
							<select class="form-control" name="tahun_ajaran">
								<?php
								$thn_skr = date('Y');
								for ($x = 2010; $x <= $thn_skr; $x++) {
									echo "<option value='$x'>$x</option>";
								}
								?>
							</select>
						</div>
					</div>

					<!--
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Tahun Angkatan</label>
												<div class="col-sm-5">
													<input type="number" name="tahun_angkatan" id="tahun" placeholder="Tahun Angkatan"
														   class="form-control">
												</div>
											</div>
					-->
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Nama Siswa</label>
						<div class="col-sm-5">
							<input type="text" name="nama_siswa" id="namamhs" placeholder="Nama Siswa"
								   class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jenis Kelamin</label>
						<div class="col-sm-8">
							<select class="form-control" name="jenis_kelamin"
									id="exampleFormControlSelect1">
								<option value="Laki-Laki">Laki-Laki
								</option>
								<option value="Perempuan">Perempuan
								</option>
							</select>
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Tgl Lahir</label>
						<div class="col-sm-5">
							<input type="date" name="tanggal_lahir" id="tgl_lahir" placeholder="Tanggal Lahir"
								   class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Telp.</label>
						<div class="col-sm-5">
							<input type="number" name="telepon"
								   id="fakulmhs" placeholder="Telpon"
								   class="form-control">
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label">Alamat</label>
						<div class="col-sm-9">
					<textarea name="alamat" id="alamatmhs" rows="5"
							  title="Your resume is too short." class="form-control"
							  placeholder="Masukkan Alamat" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Foto</label>
						<div class="col-sm-4">
							<input type="file" name="foto1" id="fakulmhs" placeholder="file"
								   class="form-control">
						</div>
						<img height="35"
							 alt="No Img" class="online">
					</div>


			</div>

			<div class="modal-footer">
				<button type="sumbit" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</form>
			</div>
		</div>
	</div>
</div>
