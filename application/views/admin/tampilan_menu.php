					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigasi
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<?php if($this->session->userdata('level') == 'admin'){ ?>
									<li class="nav-active">
										<a href="<?php echo base_url();?>index.php/home">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<a href="<?php echo base_url();?>index.php/spp">
										<i class="fa fa-money" aria-hidden="true"></i>
													 <span>Data Pembayaran</span>
										</a>
									</li>
									<?php }else{} ?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Master Data</span>
										</a>
										<ul class="nav nav-children">
											<?php if($this->session->userdata('level') == 'admin'){ ?>
											<li>
												<a href="<?php echo base_url();?>index.php/kelas">
													 Data Kelas
												</a>
											</li>
											<?php }else{} ?>
											<?php if($this->session->userdata('level') == 'admin'){ ?>
											<li>
												<a href="<?php echo base_url();?>index.php/siswa">
													 Data Siswa
												</a>
											</li>
											<?php }else{} ?>
											<li>
												<a href="<?php echo base_url();?>index.php/spp">
													 Data Pembayaran SPP
												</a>
											</li>
																					</ul>
									</li>


										<li>
										<a href="<?php echo base_url();?>index.php/Ganti_password">
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>Ganti Password</span>
										</a>
									</li>
								</ul>
							</nav>		
						</div>
					</div>
				
