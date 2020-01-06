<header class="panel-heading">
	<div class="panel-actions">
		<a href="#" class="fa fa-caret-down"></a>
		<a href="#" class="fa fa-times"></a>
	</div>
	<h2 class="panel-title">Tabel Pembayaran SPP <?php echo $this->session->userdata('usesrname'); ?></h2>
</header>
<div class="panel-body">
	<table class="table table-bordered table-striped mb-none" id="datatable">
		<thead>
		<tr>
			<th>No</th>
			<th>Kelas</th>
			<th>SPP Bulan Ke</th>
			<th>SPP Tahun Ke</th>
			<th>Cicilan 1</th>
			<th>Cicilan 2</th>
			<th>Jumlah Bayar</th>
			<th>Sisa Tagihan</th>
			<th>Status Pembayaran</th>
			<th>Aksi</th>
		</tr>
		</thead>

		<body>
		<?php $no = 1;
		if (!empty($data)) { ?>
			<?php foreach ($data as $row) { ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->kode_kelas; ?></td>
					<td><?php echo $row->p_bulan; ?></td>
					<td><?php echo $row->p_tahun; ?></td>
					<td><?php echo $row->jumlah_bayar_1; ?></td>
					<td><?php echo $row->jumlah_bayar_2; ?></td>
					<td><?php echo $row->jumlah_bayar; ?></td>
					<td><?php echo number_format($a = 145000 - $row->jumlah_bayar); ?></td>
					<td><?php if ($row->jumlah_bayar >= 145000) {
							$statusPembayaran = 1;
							echo "Lunas";
						} else {
							$statusPembayaran = 0;
							echo "Belum Lunas";
						} ?></td>

					<?php if ($statusPembayaran !== 0) { ?>
						<td>
							<a href="<?php echo base_url() ?>index.php/spp_siswas/cetak?nis=<?php echo $this->session->userdata('nis'); ?>
				&bulan=<?php echo $row->p_bulan; ?>&tahun=<?php echo $row->p_tahun; ?>"
							   class="btn btn-floating btn-success"><i class="fa fa-file-pdf-o"></i></a></td>
					<?php } else {
						echo "<td></td>";
					} ?>
				</tr>
			<?php }
		} else { ?>
			<tr>
				<td colspan="6" align="center">Anda Belum Bayar SPP!</td>
			</tr>
		<?php } ?> </body>
	</table>
</div>
<?php if ($this->session->userdata('level') == 'admin'){ ?>
<div class="modal fade" id="exampleModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<header class="panel-heading">
				<h2 class="panel-title">Tambah Kelas</h2>
			</header>

			<div class="panel-body form">
				<?php $attributes = array('class' => 'form-horizontal mb-lg');
				echo form_open('spp/simpan') ?>

				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label no-padding-right">Nama</label>
					<div class="col-sm-9">
						<select class="form-control" name="nis" id="exampleFormControlSelect1">
							<?php foreach ($data_siswa->result() as $row): ?>
								<option value="<?php echo $row->nis; ?>">
									<?php echo $row->nama_siswa . " - " . $row->nis; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Jumlah Tagihan</label>
					<div class="col-sm-9">
						<input type="text" name="jumlah_tagihan" id="fakultas"
							   placeholder="Jumlah Tagihan" class="form-control">
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
