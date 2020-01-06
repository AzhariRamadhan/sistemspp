<?php
		$info = $this->session->flashdata('info');
		
		if (!empty($info)) {

			echo '<div class="alert alert-danger">',$info,'</div>';

		}
		?>	
<!-- start: page -->

				<div class="row">
					<div class="col-md-4 col-lg-3">
						<form method="POST" action="<?php echo base_url()?>index.php/profilmhs/edit_profil" enctype="multipart/form-data">
							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
									<img src="<?php echo base_url() ?>uploads/fotosiswa/<?php echo $this->session->userdata('fotosiswa'); ?>" class="rounded img-responsive" alt="John Doe">
									</div>

									

									<hr class="dotted short">

									<h6 class="text-muted">Tentang</h6>
									<p>Siswa SMAN 1 Bengkulu Tengah</p>

									<h6 class="text-muted">Tahun Angkatan</h6>
									<p><?php echo $this->session->userdata('tahunmhs') ?></p>

									<hr class="dotted short">

									<div class="social-icons-list">
										<a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
										<a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
										<a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
									</div>

								</div>
							</section>

						</div>
						<div class="col-md-8 col-lg-6">

							<div class="tabs tabs-success">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab"><strong>Data Profil</strong></a>
									</li>
									<li>
										<a href="#edit" data-toggle="tab"><strong>Edit Profil</strong></a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
									<ul class="simple-bullet-list mb-xlg">
										<li class="green">
										<h5 class="mb-md">NIS Siswa</h5>
											<section class="panel">
											<div class="alert alert-success">
												<strong><?php echo $this->session->userdata('username') ?></strong>
											</div>
											</section>
										</li>	

										<li class="green">
										<h5 class="mb-md">Nama Siswa</h5>
											<section class="panel">
											<div class="alert alert-success">
												<strong><?php echo $this->session->userdata('namamhs') ?></strong>
											</div>
											</section>
										</li>
											
										<li class="green">
										<h5 class="mb-md">Password Akun</h5>
											<section class="panel">
											<div class="alert alert-success">
												<strong><?php echo $this->session->userdata('password') ?></strong>
											</div>
											</section>
										</li>	
										
										<li class="green">	
										<h5 class="mb-md">Tahun Angkatan</h5>
											<section class="panel">
											<div class="alert alert-success">
												<strong><?php echo $this->session->userdata('tahunmhs') ?></strong>
											</div>
											</section>
										</li>	

										<li class="green">
										<h5 class="mb-md">Alamat</h5>
											<section class="panel">
											<div class="alert alert-success">
												<strong><?php echo $this->session->userdata('alamatmhs') ?></strong>
											</div>
											</section>
										</li>	
									</ul>								


									</div>

									<div id="edit" class="tab-pane">

										<form class="form-horizontal" method="get">
											<h4 class="mb-xlg">Data Diri</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">NIS</label>
													<div class="col-md-8">
														<input type="text" name="npm" id="npm" value="<?php echo $this->session->userdata('username') ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">Nama</label>
													<div class="col-md-8">
														<input type="text" name="namamhs" id="namamhs" value="<?php echo $this->session->userdata('namamhs') ?>" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Tangal Lahir</label>
													<div class="col-md-8">
														<input type="text" name="fakulmhs" id="fakulmhs" value="<?php echo $this->session->userdata('fakulmhs') ?>" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Telp.</label>
													<div class="col-md-8">
														<input type="text" name="prodimhs" id="prodimhs" value="<?php echo $this->session->userdata('prodimhs') ?>" class="form-control">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Alamat</strong></label>
													<div class="col-md-8">
														<textarea type="text" name="alamatmhs" rows="5" class="form-control"><?php echo $this->session->userdata('alamatmhs') ?></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Tahun Ajaran</strong></label>
													<div class="col-md-8">
														<textarea type="text" name="alamatmhs" rows="5" class="form-control"><?php echo $this->session->userdata('alamatmhs') ?></textarea>
													</div>
												</div>

											<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right"><strong>Foto Siswa</strong></label>
													<div class="col-sm-5">
														<img id="avatar" style="width: 120px" class="editable" alt="Alex's Avatar" src="<?php echo base_url() ?>uploads/fotosiswa/<?php echo $this->session->userdata('fotosiswa'); ?>" />
													</div>
											</div>
											<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right"></label>	
													<div class="col-sm-5">
														<input id="fotosiswa" type="file" required  name="fotosiswa" class="form-group"  onchange="lihatgambar();">
													</div>		
      										</div>

											</fieldset>
											<hr class="dotted tall">
											<h4 class="mb-xlg">Ganti Password</h4>
											<fieldset class="mb-xl">
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPassword">Password Lama</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="passmhs" name="passmhs">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPasswordRepeat">Password Baru</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="passmhs" name="passmhs">
													</div>
												</div>
											</fieldset>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-3">

							<h4 class="mb-md"><strong>Status Pembayaran</strong></h4>
							<ul class="simple-card-list mb-xlg">
								<?php 
								if ($data->num_rows() > 0) {
									
									echo '<div class="alert alert-success"><strong>Anda Telah Membayar SPP | Silahkan Cetak Tanda Bukti Bayar</strong></div>';
									
								} else if($data->num_rows() < 1) {

									echo '<div class="alert alert-danger"><strong>Anda Belum Membayar SPP | Silahkan Lakukan Pembayaran SPP</strong></div>';
								} 
								?>
							</ul>
						</div>
					</div>
					<!-- end: page -->

<script type="text/javascript">
	
	function lihatgambar(){

	var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("fotosiswa").files[0]);
	oFReader.onload = function (oFREvent)
 	{
    document.getElementById("avatar").src = oFREvent.target.result;
	};

	};

</script>					
