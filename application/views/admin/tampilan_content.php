								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Selamat Datang Admin
									<strong class="green">
										Sistem Informasi Pembayaran SPP
									</strong>| SMAN 1 Bengkulu Tengah
								</div>

							<div class="col-md-12 col-lg-12 col-xl-4">
								<div class="row">
									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-user"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Data Kelas</h4>
															<div class="info">
																<strong class="amount"><?php $query = $this->db->query("select * from tb_kelas"); echo $query->num_rows(); ?></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase" href="<?php echo base_url();?>index.php/kelas">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-secondary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-file"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Data Pembayaran SPP</h4>
															<div class="info">
																<strong class="amount"><?php $query = $this->db->query("select * from tb_pembayaran"); echo $query->num_rows(); ?></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase" href="<?php echo base_url();?>index.php/spp">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-tertiary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-users"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Data Siswa</h4>
															<div class="info">
																<strong class="amount"><?php $query = $this->db->query("select * from tb_siswa"); echo $query->num_rows(); ?></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase" href="<?php echo base_url();?>index.php/siswa">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
								</div>
							</div>