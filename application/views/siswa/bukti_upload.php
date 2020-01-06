<!DOCTYPE html>
<head>
    <html>
    <head>
        <title>Cetak PDF</title>


        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/sma.ico"/>
        <title>SMAN 1 Bengkulu Tengah </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">


        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/css/datepicker3.css"/>

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css"/>
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/morris/morris.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/select2/select2.css"/>
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>assets/vendor/jquery-datatables-bs3/assets/css/datatables.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/pnotify/pnotify.custom.css"/>
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css"/>
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/invoice-print.css"/>


        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/theme.css"/>

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/skins/default.css"/>

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/theme-custom.css">

        <!-- Head Libs -->
        <script src="<?php echo base_url(); ?>assets/vendor/modernizr/modernizr.js"></script>

        <script src="<?php echo base_url(); ?>assets/vendor/modernizr/modernizr.js"></script>

        <!-- Tampil JS -->
        <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

        <script>

            $(document).ready(function () {
                window.print();
            });
        </script>
        <style type="text/css" media="print">
            @page {
                size: portrait;
            }
        </style>
    </head>
<body>

<?php foreach ($data_siswa as $row) { ?>

    <div class="invoice">
        <img class="img-responsive" style="float: left; width: 120px; height: 120px; margin-right: -100px;"
             src=<?php echo base_url('assets/images/smansa.png'); ?>>

        <center>
            <h5>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN KABUPATEN BENGKULU TENGAH</h5>
            <h4>SMAN 1 BENGKULU TENGAH</h4>
            <h5>Desa Kembang Seri, Kec. Talang Empat, Bengkulu Tengah</h5>
            <h6>Telp.(0736)7312022 Email : admin@smansabengkulutengah.sch.id</h6>
        </center>

        <hr style="border-style: solid; border-color: black; border-width: 3px;">
        <div class="row">
            <div class="col-xs-16">

                <center>

                    <h3>Surat Tanda Bukti Pembayaran SPP</h3>
                </center>


                <div class="col-md-6" style="float:left">
                    <div class="bill-data text-right">
                        <p class="mb-none">
                        </p>
                        <p class="mb-none">
                            <span class="text-dark">NIS:</span>
                            <span class="value"><?php echo $row->nis ?></span>
                        </p>
                        <p class="mb-none">
                            <span class="text-dark">Kode Kelas:</span>
                            <?php foreach ($data as $spp) { ?>

                                <span class="value"><?php echo $spp->kode_kelas . ', '; ?></span>

                            <?php } ?>
                        </p>
                        <p class="mb-none">
                            <span class="text-dark">Tanggal Pembayaran:</span>
                            <?php foreach ($data as $spp) { ?>

                                <span class="value"><?php echo $spp->tanggal_bayar . ', '; ?></span>

                            <?php } ?>
                        </p>
                        <p class="mb-none">
                            <span class="text-dark">Jumlah Pembayaran:</span>
                            <?php foreach ($data as $spp) { ?>

                                <span class="value"><?php echo $spp->jumlah_bayar . ', '; ?></span>

                            <?php } ?>
                        </p>


                    </div>
                </div>

                <div class="col-xs-12">
                    <br>
                    <br>
                    <p>Dengan ini menyatakan bahwa siswa atas nama :</p>
                </div>
            </div>


            <div class="col-xs-12">

                <h5>Nama Siswa &emsp;:&emsp;<strong><?php echo $row->nama_siswa ?></strong></h5>
                <h5>NIS &emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;<strong><?php echo $row->nis ?></strong></h5>

            </div>


            <div class="col-xs-12">
                <br>
                <p>Telah melakukan pembayaran SPP di sman 1 Bengkulu Tengah di bulan <?php echo $bulan; ?>
                    tahun <?php echo $tahun; ?></p>
                <p>Demikianlah tanda bukti pembayaran ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
            </div>
        </div>
    </div>
    <br>
    <br>

<?php } ?>

</body>
</html>