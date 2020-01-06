<header class="panel-heading">
							<div class="panel-actions">
								<a href="#" class="fa fa-caret-down"></a>
								<a href="#" class="fa fa-times"></a>
							</div>

							<h2 class="panel-title">Tabel Data Pembayaran SPP - <?php echo $this->session->userdata('usesrname'); ?></h2>
						</header>

						<div class="panel-body">
							<table class="table table-bordered table-striped mb-none" id="datatable-tabletools">
								<thead>
									<tr>
										<th>No</th>
										<th>NIS</th>
										<!-- <th>Kelas</th> -->
										<th>Tanggal Bayar</th>
										<th>Jumlah Bayar</th>
										<th>Sisa Tagihan</th>
										<th>Status Pembayaran</th>
										<?php if($this->session->userdata('level') == 'admin'){ ?>
										<th>Aksi</th>
										<?php }else{} ?>
									</tr>
								</thead>

								<body>

									<?php $no=1; if(empty($data)){ ?>
									<?php foreach ($data->result() as $row){ ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $row->nis ?></td>
										<!-- <td><?php //echo $row->kode_kelas ?></td> -->
										<td><?php echo $row->tanggal_bayar ?></td>
										<td><?php echo number_format($row->jumlah_bayar) ?></td>
										<td><?php echo number_format($a = 145000 - $row->jumlah_bayar); ?></td>
										<td><?php if($row->jumlah_bayar == 145000){ echo "Lunas"; }else{ echo "Belum Lunas"; }  ?></td>
										<?php if($this->session->userdata('level') == 'admin'){ ?>
										<td>
											<button class="btn btn-floating btn-primary" data-toggle="modal"
												data-target="#exampleModal<?php echo $row->id_pembayaran ;?>"><i
													class="fa fa-pencil"></i></button>
											<div class="modal fade" id="exampleModal<?php echo $row->id_pembayaran ;?>" role="dialog">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<header class="panel-heading">
															<h2 class="panel-title">Ubah Kelas - <?php echo number_format($row->jumlah_bayar) ?></h2> 
														</header>

														<div class="panel-body form">
															<?php $attributes = array('class' => 'form-horizontal mb-lg'); echo form_open('spp/ubah') ?>
															<input type="hidden" name="id_pembayaran" value="<?php echo $row->id_pembayaran; ?>">
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Jumlah
																	Tagihan</label>
																<div class="col-sm-9">
																	<input type="text" name="jumlah_tagihan" id="fakultas"
																		placeholder="Jumlah Tagihan" class="form-control">
																</div>
															</div>


														</div>

														<div class="modal-footer">
															<button type="submit" class="btn btn-primary">Ubah</button>
															<button type="button" class="btn btn-secondary"
																data-dismiss="modal">Batal</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<a href="<?php echo base_url() ?>index.php/spp/hapus/<?php echo $row->id_pembayaran; ?>"
												class="btn btn-floating btn-danger"><i class="fa fa-trash-o"></i></a>
										</td>
										<?php }else{} ?>
									</tr>
									<?php } }else{ ?>
									<tr>
										<td colspan="6" align="center">Anda Belum Bayar SPP!</td>
									</tr>
									<?php } ?> </body> </table> </div> 
									<?php if($this->session->userdata('level') == 'admin'){ ?>
									<div class="modal fade" id="exampleModal" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<header class="panel-heading">
													<h2 class="panel-title">Tambah Kelas</h2>
												</header>

												<div class="panel-body form">
													<?php $attributes = array('class' => 'form-horizontal mb-lg'); echo form_open('spp/simpan') ?>

													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label no-padding-right">Nama</label>
														<div class="col-sm-9">
															<select class="form-control" name="nis" id="exampleFormControlSelect1">
																<?php foreach ($data_siswa->result() as $row): ?>
																<option value="<?php echo $row->nis; ?>">
																	<?php echo $row->nama_siswa." - ".$row->nis; ?></option>
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
										<?php }else{} ?>
						</div>
