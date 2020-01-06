<header class="panel-heading">
	<div class="panel-actions">
		<a href="#" class="fa fa-caret-down"></a>
		<a href="#" class="fa fa-times"></a>
	</div>
	<h2 class="panel-title">Biodata Siswa</h2>
</header>
<div class="panel-body">

	<?php
	$no = 1;
	foreach ($data

			 as $row) {
		?>




		<!-- button edit biodata -->

		<!-- table data siswa -->

		<div class="card-body">
			<style>
				input.hidden {
					position: absolute;
					left: -9999px;
				}

				#profile-image1 {
					cursor: pointer;

					width: 100px;
					height: 100px;
					border: 2px solid #03b1ce;
				}

				.tital {
					font-size: 16px;
					font-weight: 500;
				}

				.bot-border {
					border-bottom: 1px #f8f8f8 solid;
					margin: 5px 0 5px 0
				}
			</style>
			<!------ Include the above in your HEAD tag ---------->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-sm-10 ">

						<div class="panel panel-default">
							<div class="panel-body">

								<div class="box box-info">

									<div class="box-body col-md-8">




										<div class="clearfix"></div>
										<div class="bot-border"></div>

										<div class="col-sm-5 col-xs-6 tital ">NIS:</div>
										<div class="col-sm-7 col-xs-6 "><?php echo $row->nis; ?></div>
										<div class="clearfix"></div>
										<div class="bot-border"></div>

										<div class="col-sm-5 col-xs-6 tital ">Nama:</div>
										<div class="col-sm-7 col-xs-6 "><?php echo $row->nama_siswa; ?></div>
										<div class="clearfix"></div>
										<div class="bot-border"></div>

										<div class="col-sm-5 col-xs-6 tital ">Tahun ajaran:</div>
										<div class="col-sm-7 col-xs-6 "><?php echo $row->tahun_ajaran; ?></div>
										<div class="clearfix"></div>
										<div class="bot-border"></div>

										<div class="col-sm-5 col-xs-6 tital ">Jenis kelamin:</div>
										<div class="col-sm-7"> <?php echo $row->jenis_kelamin; ?></div>
										<div class="clearfix"></div>
										<div class="bot-border"></div>

										<div class="col-sm-5 col-xs-6 tital ">Tanggal lahir:</div>
										<div class="col-sm-7"> <?php echo date_indo($row->tanggal_lahir); ?></div>
										<div class="clearfix"></div>
										<div class="bot-border"></div>

										<div class="col-sm-5 col-xs-6 tital ">Telepon:</div>
										<div class="col-sm-7"><?php echo $row->telpon; ?></div>

										<div class="clearfix"></div>
										<div class="bot-border"></div>

										<div class="col-sm-5 col-xs-6 tital ">Alamat:</div>
										<div class="col-sm-7"><?php echo $row->alamat; ?></div>

										<div class="clearfix"></div>
										<div class="bot-border"></div>


										<!-- /.box-body -->
									</div>
									<!-- /.box -->

								</div>

								<div class="col-md-2 col-sm-2">
									<div align="center"><img alt="User Pic"
															 src="<?php echo base_url() ?>uploads/fotosiswa/<?php echo $this->session->userdata('foto'); ?>"
															 id="profile-image1"
															 class="img-circle img-responsive">
									</div>

									<br>

									<!-- /input-group -->
								</div>


							</div>
						</div>
					</div>


				</div>
			</div>


			<!-- <div class="table-responsive">
					 <table class="table">
						 <thead>
							 <tr>
								 <th><?php /*echo $row->nis; */ ?></th>
									 <th>
										 <div><img style="background-image: url(&quot;assets/images/smansa.png&quot;);"></div>
									 </th>
									 </tr>
										 </thead>
											 <tbody>
												 <tr>
													 <td><?php /*echo $row->nama_siswa; */ ?></td>
												 </tr>
												 <tr>
													 <td><?php /*echo $row->tanggal_lahir; */ ?></td>
												 </tr>
												 <tr>
													 <td><?php /*echo $row->telpon; */ ?></td>
												 </tr>
												 <tr>
													 <td><?php /*echo $row->jenis_kelamin; */ ?></td>
												 </tr>
												 <tr>
													 <td><?php /*echo $row->alamat; */ ?></td>
												 </tr>
											 </tbody>
					 </table>
				 </div>-->
		</div>
		<?php if ($row->Verifikasi == "Belum") { ?>
			<!-- button edit biodata -->
			<header class="panel-heading">
				<h5 class="mb-0">
					<button class="btn btn-oval btn-success" data-toggle="modal"
							data-target="#exampleModal<?php echo $row->id_siswa; ?>" type="button">
						<i class="fa fa-edit"></i>
						Edit
					</button>
					<div class="modal fade" id="exampleModal<?php echo $row->id_siswa; ?>" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<header class="panel-heading">
									<h2 class="panel-title">Ubah Siswa</h2>
								</header>

								<div class="panel-body form">
									<form class="form-horizontal mb-lg" enctype="multipart/form-data" method="post"
										  action="<?php echo site_url('profilsiswa/ubah') ?>">

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">NIS</label>
											<div class="col-sm-5">
												<input type="number" name="nis" value="<?php echo $row->nis; ?>"
													   id="npm"
													   placeholder="NIS" class="form-control">
												<input type="hidden" name="id_siswa_lama"
													   value="<?php echo $row->id_siswa; ?>"
													   id="id_siswa_lama" class="form-control">
												<input type="hidden" name="nis_lama" value="<?php echo $row->nis; ?>"
													   id="npm"
													   placeholder="NIS" class="form-control">
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
												<input type="text" value="<?php echo $row->nama_siswa; ?>"
													   name="nama_siswa"
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
				</h5>
			</header>
		<?php } ?>
	<?php } ?>

	<!-- table data siswa -->


	<!-- <div class="panel-body form">
    <div class="form-group">
        
        <div class="col-sm-5">
            <input type="number" value="<?php echo $row->nis; ?>"
                   name="nis" id="nis"
                   placeholder="NIS" class="form-control" required disabled>
        </div>
	</div>
	
	

    <input type="hidden" name="nis" value="<?php echo $row->nis; ?>" disabled>
    <div class="form-group">
        
        <div class="col-sm-5">
            <input type="text" value="<?php echo $row->nama_siswa; ?>" name="nama_siswa"
                   id="namamhs" placeholder="Nama Siswa"
                   class="form-control" required disabled>
        </div>
	</div>
    <div class="form-group">
        
        <div class="col-sm-5">
            <input type="date" value="<?php echo $row->tanggal_lahir; ?>" name="tanggal_lahir"
                   id="tgl_lahir" placeholder="Tanggal Lahir"
                   class="form-control" required disabled>
        </div>
	</div>
	
    <div class="form-group">
        <div class="col-sm-5">
            <input type="number" value="<?php echo $row->telpon; ?>" name="telepon"
                   id="fakulmhs" placeholder="Telpon"
                   class="form-control" required disabled>
        </div>
    </div>

    <div class="form-group">
        
        <div class="col-sm-5">
            <select class="form-control" name="jenis_kelamin"
                    id="exampleFormControlSelect1" disabled>
                <option value="Laki-Laki" <?php if ($row->jenis_kelamin == "Laki-Laki") {
		echo "selected";
	} ?>>Laki-Laki
                </option>
                <option value="Perempuan" <?php if ($row->jenis_kelamin == "Perempuan") {
		echo "selected";
	} ?>>Perempuan
                </option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-9">
					<textarea name="alamat" id="alamatmhs" rows="5"
                              title="Your resume is too short." class="form-control"
                              placeholder="Masukkan Alamat" required disabled> <?php echo $row->alamat; ?></textarea>
        </div>
    </div>

    

    <div class="form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-4">

            
        </div>
    </div> -->


	<!-- end: page -->


	<!--<div class="modal fade" id="exampleModal" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<header class="panel-heading">
				<h2 class="panel-title">Tambah Siswa</h2>
				</header>

	<div class="panel-body form">
		<form class= "form-horizontal mb-lg" enctype="multipart/form-data" method="post" action="<?php /*echo site_url('profilsiswa/simpan')*/ ?>">
		<div class="form-group">
		<label class="col-md-3 control-label no-padding-right">NIS</label>
		<div class="col-sm-5">
		<input type="hidden" name="nis" id="npm" placeholder="NIS" class="form-control" required>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Tahun Angkatan</label>
		<div class="col-sm-5">
		<input type="number" name="tahun_angkatan" id="tahun" placeholder="Tahun Angkatan"
				class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Nama Siswa</label>
		<div class="col-sm-8">
		<input type="text" name="nama_siswa" id="namamhs" placeholder="Nama Siswa"
				class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Jenis Kelamin</label>
		<div class="col-sm-8">
		<select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
		<option value="Laki-Laki">Laki-Laki</option>
		<option value="Perempuan">Perempuan</option>
		</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Tgl Lahir</label>
		<div class="col-sm-8">
		<input type="date" name="tanggal_lahir" id="tgl_lahir" placeholder="Tanggal Lahir"
				class="form-control" required>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Password Akun</label>
		<div class="col-sm-5">
		<input type="text" name="passmhs" id="passmhs" placeholder="Password" class="form-control" value="" required>
		</div>	
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Telp.</label>
		<div class="col-sm-5">
		<input type="number" name="telepon" id="fakulmhs" placeholder="Telpon"
				class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label">Alamat</label>
		<div class="col-sm-9">
		<textarea name="alamat" id="alamatmhs" rows="5" title="Your resume is too short."
				class="form-control" placeholder="Masukkan Alamat" required></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label">Foto</label>
		<div class="col-sm-4">
		<input type="file" name="foto" id="fakulmhs" placeholder="Telpon"
				class="form-control">
		</div>
	</div>

	</div>

	<div class="modal-footer">
		<button type="sumbit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					</form>
				</div>
			</div>
		</div>
	</div>-->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
	<script src="assets/js/theme.js"></script>