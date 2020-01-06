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

	<h2 class="panel-title">Tabel Data Pembayaran SPP <?php echo $this->session->userdata('usesrname'); ?></h2>
</header>

<div class="panel-body">
	<?php if ($this->session->userdata('level') == 'admin') { ?>
		<p>
			<button class="btn btn-oval btn-success" data-toggle="modal" data-target="#exampleModal">
				<i class="glyphicon glyphicon-plus"></i>Tambah
			</button>

			<a class="btn btn-oval btn-warning pull-right" href="<?php echo site_url('laporan') ?>"> <i
					class="fa fa-print"></i> Cetak</a>
		</p>
	<?php } else {
	} ?>
	<table class="table table-bordered table-striped mb-none" id="datatable">
		<thead>
		<tr>
			<th>No</th>
			<th>NIS</th>
			<!-- <th>Kelas</th> -->
			<th>Nama Siswa</th>
			<th>Kelas</th>
			<th>Tanggal Bayar</th>
			<th>Cicilan 1</th>
			<th>Cicilan 2</th>
			<th>Jumlah Bayar</th>
			<th>Tagihan Bulan ke</th>
			<th>Tagihan Tahun</th>
			<th>Sisa Tagihan</th>
			<th>Status Pembayaran</th>
			<?php if ($this->session->userdata('level') == 'admin') { ?>
				<th>Aksi</th>
			<?php } else {
			} ?>
		</tr>
		</thead>

		<body>

		<?php $no = 1;
		if (!empty($data)) { ?>
			<?php foreach ($data as $row) { ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->nis; ?></td>
					<!-- <td><?php //echo $row->kode_kelas ?></td> -->
					<td><?php echo $row->nama_siswa; ?></td>
					<td><?php echo $row->kode_kelas; ?></td>
					<td><?php echo date_indo($row->tanggal_bayar); ?></td>
					<td><?php echo $row->jumlah_bayar;?></td>
					<td><?php echo $row->jumlah_bayar_2;?></td>
					<td><?php echo number_format($row->jumlah_bayar + $row->jumlah_bayar_2); ?></td>

					<td><?php echo $row->p_bulan; ?></td>
					<td><?php echo $row->p_tahun; ?></td>
					<td><?php echo number_format(145000 - ($row->jumlah_bayar + $row->jumlah_bayar_2)); ?></td>
					<td><?php
						if ((145000 - ($row->jumlah_bayar + $row->jumlah_bayar_2)) > 0) {
							echo "<span class=\"label label-pill label-danger\">Belum lunas</span>";
						} else {
							echo "<span class=\"label label-pill label-success\">Lunas</span>";
						} ?></td>


					<!--       <td><?php
					/*                            $simbol = "";
												if ($row->jumlah_bayar > 145000) {
													$simbol = "+";
												}
												$sisaTagihan = $row->jumlah_bayar - 145000;
												echo $simbol . $sisaTagihan;
												*/ ?></td>
                        <td><?php /*if ($row->jumlah_bayar >= 145000) {
                                echo "Lunas";
                            } else {
                                echo "Belum Lunas";
                            } */ ?></td>-->
					<?php if ($this->session->userdata('level') == 'admin') { ?>
						<td>
							<a href="<?php echo base_url() ?>index.php/spp/hapus/<?php echo $row->id_pembayaran; ?>"
							   class="btn btn-floating btn-danger"><i class="fa fa-trash-o"></i></a>

							<button class="btn btn-floating btn-primary" data-toggle="modal"
									data-target="#exampleModal<?php echo $row->id_pembayaran; ?>"><i
									class="fa fa-pencil"></i></button>

							<div class="modal fade" id="exampleModal<?php echo $row->id_pembayaran; ?>" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<header class="panel-heading">
											<h2 class="panel-title">Ubah Data Pembayaran</h2>
										</header>

										<div class="panel-body form">
											<?php $attributes = array('class' => 'form-horizontal mb-lg');
											echo form_open('spp/ubah') ?>
											<input type="hidden" name="id_pembayaran"
												   value="<?php echo $row->id_pembayaran; ?>">
											<div class="form-group mt-lg">
												<label class="col-sm-3 control-label no-padding-right">Nama</label>
												<div class="col-sm-9">
													<select class="select2-nama-siswa" name="id_siswa"
															id="exampleFormControlSelect1">
														<?php foreach ($data_siswa->result() as $siswa): ?>
															<option
																value="<?php echo $siswa->id_siswa; ?>" <?php if ($row->id_siswa === $siswa->id_siswa) {
																echo "selected";
															} ?>><?php echo $siswa->nis . " - " . $siswa->nama_siswa; ?></option>
														<?php endforeach ?>
													</select>
												</div>
											</div>

											<div class="form-group mt-lg">
												<label class="col-sm-3 control-label no-padding-right">Kelas</label>
												<div class="col-sm-9">
													<select class="select2-nama-siswa" name="id_kelas"
															id="exampleFormControlSelect1">
														<?php foreach ($data_kelas->result() as $kelas): ?>
															<option value="<?php echo $kelas->id_kelas; ?>"
																<?php
																if ($kelas->id_kelas === $row->id_kelas) {
																	echo "selected";
																}
																?>

															>
																<?php echo $kelas->kode_kelas; ?></option>
														<?php endforeach ?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Cicilan
													pertama</label>
												<div class="col-sm-9">
													<input type="number" name="jumlah_tagihan" id="fakultas"
														   placeholder="Cicilan kedua" class="form-control"
														   value="<?php echo $row->jumlah_bayar ?>" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Cicilan
													kedua</label>
												<div class="col-sm-9">
													<input type="number" name="jumlah_tagihan_2" id="fakultas"
														   placeholder="Cicilan kedua" class="form-control"
														   value="<?php echo $row->jumlah_bayar_2 ?>" required>
												</div>
											</div>


											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Tgl
													Pembayaran</label>
												<div class="col-sm-8">
													<input type="date" name="tgl_pembayaran" id="tgl_pembayaran"
														   placeholder="Tanggal Pembayaran"
														   class="form-control" required
														   value="<?php echo $row->tanggal_bayar ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Tagihan bulan
													ke</label>
												<div class="col-sm-8">
													<select class="form-control" name="p_bulan">
														<?php for ($i = 1; $i < 13; $i++) {
															echo '<option ';
															if ($row->p_bulan == $i) {
																echo "selected";
															}
															echo ' value="' . $i . '">' . bulan($i) . '</option>';
														} ?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Tagihan tahun
													ke</label>
												<div class="col-sm-8">
													<select class="form-control" name="p_tahun">
														<?php
														$thn_skr = date('Y');
														for ($x = 2010; $x <= $thn_skr; $x++) {
															echo "<option value='$x' ";
															if ("$x" === "$row->p_tahun") {
																echo "selected";
															}
															echo ">$x</option>";
														}
														?>
													</select>
												</div>
											</div>

											<!--	<div class="from-group">
													<label class="col-sm-3 control label no-padding-right">Sisa Pembayaran</label>
													<div class="col-sm-8">
														<input class="form-control" name="sisaTagihan">
													</div>
												</div>

												<div class="from-group">
													<label class="col-sm-3 control label no-padding-right">Status Pembayaran</label>
													<div class="col-sm-8">
														<input class="form-control" name="status">
													</div>
												</div>

											</div>
	-->

											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">Ubah</button>
												<button type="button" class="btn btn-secondary"
														data-dismiss="modal">Batal
												</button>
												</form>
											</div>
										</div>
									</div>
								</div>


								<!--<a href="<?php echo base_url() ?> index.php/spp/verfikasi/<?php echo $row->id_pembayaran ?>"
													class="btn btn-floating btn-info"> <i class="fa fa-check" aria-hidden="true"></i></button>-->

						</td>
					<?php } else {
					} ?>
				</tr>
			<?php }
		} else { ?>
			<tr>
				<td colspan="12" align="center">Anda Belum Bayar SPP!</td>
			</tr>
		<?php } ?> </body>
	</table>
</div>
<?php if ($this->session->userdata('level') == 'admin'){ ?>
<div class="modal fade" id="exampleModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<header class="panel-heading">
				<h2 class="panel-title">Tambah Data Pembayaran SPP</h2>
			</header>

			<div class="panel-body form">
				<?php $attributes = array('class' => 'form-horizontal mb-lg');
				echo form_open('spp/simpan') ?>

				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label no-padding-right">Nama</label>
					<div class="col-sm-9">
						<select class="select2-nama-siswa" name="id_siswa" id="exampleFormControlSelect1">
							<?php foreach ($data_siswa->result() as $row): ?>
								<option value="<?php echo $row->id_siswa; ?>">
									<?php echo $row->nis . " - " . $row->nama_siswa; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label no-padding-right">Kelas</label>
					<div class="col-sm-9">
						<select class="select2-nama-siswa" name="id_kelas" id="exampleFormControlSelect1">
							<?php foreach ($data_kelas->result() as $row): ?>
								<option value="<?php echo $row->id_kelas; ?>">
									<?php echo $row->kode_kelas; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Cicilan pertama</label>
					<div class="col-sm-9">
						<input type="text" name="jumlah_tagihan" id="fakultas"
							   placeholder="Cicilan pertama" class="form-control" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Cicilan kedua</label>
					<div class="col-sm-9">
						<input type="number" name="jumlah_tagihan_2" id="fakultas"
							   placeholder="Cicilan kedua " class="form-control" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Tgl Pembayaran</label>
					<div class="col-sm-8">
						<input type="date" name="tgl_pembayaran" id="tgl_pembayaran" placeholder="Tanggal Pembayaran"
							   class="form-control" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Tagihan bulan ke</label>
					<div class="col-sm-8">
						<select class="form-control" name="p_bulan">
							<?php for ($i = 1; $i < 13; $i++) {
								echo '<option value="' . $i . '">' . bulan($i) . '</option>';
							} ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Tagihan tahun ke</label>
					<div class="col-sm-8">
						<select class="form-control" name="p_tahun">
							<?php
							$thn_skr = date('Y');
							for ($x = 2010; $x <= $thn_skr; $x++) {
								echo "<option value='$x'>$x</option>";
							}
							?>
						</select>
					</div>
				</div>


			</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</form>
			</div>
		</div>
	</div>
	<?php } else {
	} ?>
</div>
