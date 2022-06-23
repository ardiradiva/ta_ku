<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("head.php") ?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<?php $this->load->view("sidebar.php") ?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<?php $this->load->view("navbar.php") ?>

				<!-- Sidebar Toggle (Topbar) -->
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>

				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item no-arrow">
						<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
							<div class="input-group">
								<!-- <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
								<div class="input-group-append">
									<!-- <button class="btn btn-primary" type="button">
											<i class="fas fa-search fa-sm"></i> -->
									</button>
								</div>
							</div>
						</form>
					</li>
				</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
					</div>

					<div class="row">

						<!-- Area Chart -->
						<div class="col-xl-12 col-lg-12">
							<div class="card shadow mb-4">

								<!-- Card Body -->
								<div class="card-body">
									<!------------------------->

									<div id="wrapper">
										<div id="content-wrapper">
											<div class="container-fluid">
												<!-- DataTables -->
												<div class="card mb-3">
													<div class="card-header">
														<!--<a href="<?php echo site_url('nilai/add') ?>"><i class="fas fa-plus"></i> Add New</a>-->
													</div>
													<div class="card-body">

														<div class="table-responsive">

															<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
																<thead>
																	<tr>
																		<th>id_supplier</th>
																		<th>rasa</th>
																		<th>aroma</th>
																		<th>warna</th>
																		<th>aksesibilitas</th>
																		<th>packaging</th>
																		<th>konsistensi</th>
																		<th>harga</th>
																		<th>fleksibilitas</th>
																		<th>garansi</th>
																		<th>jarak</th>
																		<th>lokasi</th>
																		<th>legalitas</th>
																		<th>manajerial</th>
																		<th>komunikasi</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody>
																	<!-- 
							rasa	aroma	warna	aksesibilitas	packaging	konsistensi	harga	fleksibilitas	garansi	jarak	lokasi	legalitas	manajerial	komunikasi	
							-->
																	<?php foreach ($nilai as $nilai) : ?>
																		<tr>
																			<td width="150">
																				<?php echo $nilai->id_supplier ?>
																			</td>
																			<td><?php echo $nilai->rasa ?></td>
																			<td><?php echo $nilai->aroma ?></td>
																			<td><?php echo $nilai->warna ?></td>
																			<td><?php echo $nilai->aksesibilitas ?></td>
																			<td><?php echo $nilai->packaging ?></td>
																			<td><?php echo $nilai->konsistensi ?></td>
																			<td><?php echo $nilai->harga ?></td>
																			<td><?php echo $nilai->fleksibilitas ?></td>
																			<td><?php echo $nilai->garansi ?></td>
																			<td><?php echo $nilai->jarak ?></td>
																			<td><?php echo $nilai->lokasi ?></td>
																			<td><?php echo $nilai->legalitas ?></td>
																			<td><?php echo $nilai->manajerial ?></td>
																			<td><?php echo $nilai->komunikasi ?></td>
																			<td width="250">
																				<a href="<?php echo site_url('nilai/edit/' . $nilai->id_nilai) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
																				<a onclick="if (confirm('Benarkah ingin menghapus?')){return true;}else{event.stopPropagation(); event.preventDefault();};" href="<?php echo site_url('nilai/delete/' . $nilai->id_nilai) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
																			</td>
																		</tr>
																	<?php endforeach; ?>

																</tbody>
															</table>
														</div>
													</div>
												</div>

											</div>
											<!-- /.container-fluid -->



										</div>
										<!-- /.content-wrapper -->

									</div>
									<!-- /#wrapper -->



									<!------------------------- ->


                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.container-fluid -->

								</div>
								<!-- End of Main Content -->

								<!-- Footer -->
								<?php $this->load->view("footer.php") ?>
								<!-- End of Footer -->

							</div>
							<!-- End of Content Wrapper -->

						</div>
						<!-- End of Page Wrapper -->




						<?php $this->load->view("jsload.php") ?>

</body>

</html>