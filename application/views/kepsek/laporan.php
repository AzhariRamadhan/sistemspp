
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
        <h2 class="panel-title">Laporan Data Pembayaran SPP</h2>
</header>

<body>
    <div class="panel-body">
    <form method="post" action="cetak">
      <!--  <label><strong>Filter Berdasarkan</strong></label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />
        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>-->
        <div id="form-bulan">
            <label>Bulan</label><br>
            <select class="col-sm-4 form-control" name="bulan">
                <?php for ($i=1; $i <10 ; $i++) {
                    echo '<option value="0'.$i .'">'. bulan($i)  . '</option>';
                }?>
                <?php for ($i=10; $i <13 ; $i++) {
                    echo '<option value="'.$i .'">'. bulan($i)  . '</option>';
                }?>
            </select>
            <br /><br />
        </div>
        <div id="form-tahun">
            <label>Tahun</label><br>
            <input class="form-control" name="tahun" type="number" pattern=".{4,4}" required>
            <br /><br />
        </div>
        <button class="btn btn-small btn-success" type="submit"><i class="fa fa-file-pdf-o"></i> Unduh PDF</button>

    </form>
    <hr />
  <!--  <table class="table table-bordered table-striped mb-none">
    <tr>
        <th>Tanggal Pembayaran</th>
        <th>Id Pembayaran</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
    </tr>
    --><?php
/*    if( ! empty($transaksi)){
      $no = 1;
      foreach($transaksi->result() as $data){

            $tgl = date('d-m-Y', strtotime($data->tgl_upload));
            
        echo "<tr>";
        echo "<td>".$tgl."</td>";
        echo "<td>".$data->nis."</td>";
        echo "<td>".$data->nama_siswa."</td>";
        echo "<td>".$data->judul."</td>";
        echo "<td>".$data->tgl_sidang."</td>";
        echo "</tr>";
        $no++;
      }
    }
    */?>
    
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
  <!--  <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>-->
</table>
</div>
</body>
</html>