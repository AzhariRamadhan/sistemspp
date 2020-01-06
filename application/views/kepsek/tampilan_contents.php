<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Selamat Datang Kepala Sekolah
									<strong class="green">
										di Sistem Informasi Pembayaran SPP
									</strong>| SMAN 1 Bengkulu Tengah
								</div>

							<div class="col-md-12 col-lg-12 col-xl-4">
								<div class="row">

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

													</div>
												</div>
											</div>
										</section>
									</div>
								</div>
							</div>
