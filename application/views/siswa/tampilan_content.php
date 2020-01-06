								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Selamat Datang

									<strong class="green"><?php echo $this->session->userdata('namamhs')?>
										di Sistem Informasi Pembayaran SPP
									</strong>
									| SMAN 1 Bengkulu Tengah
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
															<h4 class="title">Data Pembayaran SPP Tiap Bulan</h4>
															<div class="info">
																<strong class="amount"><?php $query = $this->db->query("SELECT * FROM tb_pembayaran INNER JOIN tb_siswa 
ON tb_pembayaran.id_siswa = tb_siswa.id_siswa WHERE tb_siswa.nis = ". $this->session->userdata("nis")); echo $query->num_rows(); ?></strong>
															</div>
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
															<i class="fa fa-check"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Verifikasi</h4>
															<div class="info">
																<strong class="amount"><?php $query = $this->db->query("SELECT Verifikasi FROM tb_siswa WHERE nis = "
                                                                    . $this->session->userdata("nis")); echo $query->result()[0]->Verifikasi; ?></strong>
															</div>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
								</div>
							</div>														
