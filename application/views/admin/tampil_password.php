<?php $info = $this->session->flashdata('info');
if (!empty($info)) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $info; ?>
    </div>
<?php }
?>
<form class= "form-horizontal mb-lg" enctype="multipart/form-data" method="post" action="<?php echo site_url('Ganti_password/GantiPswd')?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Password Lama</label>
    <input type="password" minlength="6" maxlength="20" class="form-control" name="pswdl" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Password Lama">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Pasword Baru</label>
    <input type="password" minlength="6" maxlength="20"maxlength="255" class="form-control" name="pswdb" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Password Baru">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Konfirmasi Password</label>
    <input type="password" minlength="6" maxlength="20" class="form-control" name="pswdbr" id="exampleInputPassword1" placeholder="Masukkan Password Baru Sekali Lagi">
  </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>
</form>

			