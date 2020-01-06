<header class="panel-heading">
    <div class="panel-actions">
        <a href="#" class="fa fa-caret-down"></a>
        <a href="#" class="fa fa-times"></a>
    </div>

    <h2 class="panel-title">Tabel Data Pembayaran SPP <?php echo $this->session->userdata('usesrname'); ?></h2>
</header>

<div class="panel-body">

<div class="row" style="margin: 8px">
        <p>
            <a class="btn btn-oval btn-warning pull-right" href="<?php echo site_url('kepsek/laporanIndex') ?>"> <i
                        class="fa fa-print" ></i> Cetak</a>
        </p>
</div>

    <div class="row" style="margin: 8px">
    <table class="table table-bordered table-striped mb-none" id="datatable">
        <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <!-- <th>Kelas</th> -->
            <th>Nama Siswa</th>
            <th>Tanggal Bayar</th>
			<th>Cicilan 1</th>
			<th>Cicilan 2</th>
            <th>Jumlah Bayar</th>
            <th>Tagihan Bulan ke</th>
            <th>Tagihan Tahun ke</th>
			<th>Sisa Tagihan</th>
			<th>Status Pembayaran</th>
         <!--   <th>Sisa Tagihan</th>
            <th>Status Pembayaran</th>-->

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
                    <td><?php echo date_indo($row->tanggal_bayar); ?></td>
					<td><?php echo $row->jumlah_bayar; ?></td>
					<td><?php echo $row->jumlah_bayar_2; ?></td>
					<td><?php echo number_format($row->jumlah_bayar + $row->jumlah_bayar_2);?></td>
					<td><?php echo $row->p_bulan; ?></td>
                    <td><?php echo $row->p_tahun; ?></td>
					<td><?php echo number_format(145000 - ($row->jumlah_bayar + $row->jumlah_bayar_2)); ?></td>
					<td><?php
						if ((145000 -($row->jumlah_bayar + $row->jumlah_bayar_2)) > 0){
							echo "<span class=\"label label-pill label-danger\">Belum lunas</span>";
						}else{
							echo "<span class=\"label label-pill label-success\">Lunas</span>";
						} ?></td>

                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="12" align="center">Belum ada yang membayar SPP!</td>
            </tr>
        <?php } ?> </body>
    </table>
    </div>
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
                        <select class="select2-nama-siswa" name="nis" id="exampleFormControlSelect1">
                            <?php foreach ($data_siswa->result() as $row): ?>
                                <option value="<?php echo $row->nis; ?>">
                                    <?php echo $row->nis . " - " . $row->nama_siswa ; ?></option>
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

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">Tgl Pembayaran</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl_pembayaran" id="tgl_pembayaran" placeholder="Tanggal Pembayaran"
                               class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">Tagihan bulan ke</label>  <div class="col-sm-8">
                    <select class="form-control"  name="p_bulan">
                        <?php for ($i=1; $i <13 ; $i++) {
                            echo '<option value="'.$i .'">'. bulan($i)  . '</option>';
                        }?>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">Tagihan tahun ke</label>
                    <div class="col-sm-8">
                        <input class="form-control"  name="p_tahun" type="number" minlength="4" maxlength="4" required>
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
