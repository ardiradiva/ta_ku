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
			<div id="content" style="height: 600px;overflow: scroll;">

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

				<div class="container-fluid text-dark">
					<!-- Page Heading -->
					<h2 class="m-0 font-weight-bold text-primary">Pengaturan Bobot</h2>
					<p class="mb-4">
					</p>
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<!-- Card  -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h4 class="m-0 font-weight-bold text-primary">Data Bobot Kriteria</h4>
							<hr>

							<form action="<?= base_url('Bobot/updateBobot') ?>" method="post" enctype="multipart/form-data">
								<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/bobot/edit/ID --->
								<!-- <input hidden type="text" name="id_bobot" value="<?= $bobot->id_bobot ?>"> -->
								<input type="hidden" name="id" value="<?= $bobot->id_bobot ?>" />
								<input type="hidden" name="id_admin" value="<?= $bobot->id_admin ?>" />
								<div class="form-group">
									<b><label for="rasa">Kriteria 1 (Rasa)</label></b>
									<input class="form-control <?php echo form_error('rasa') ? 'is-invalid' : '' ?>" type="number" name="rasa" placeholder="rasa" value="<?php echo $bobot->rasa ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('rasa') ?>
									</div>

								</div>

								<div class="form-group">
									<b><label for="aroma">Kriteria 2 (Aroma)</label></b>
									<input class="form-control <?php echo form_error('aroma') ? 'is-invalid' : '' ?>" type="number" name="aroma" placeholder="aroma" value="<?php echo $bobot->aroma ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('aroma') ?>
									</div>
								</div>

								<div class="form-group">
									<b><label for="warna">Kriteria 3 (Warna)</label></b>
									<input class="form-control <?php echo form_error('warna') ? 'is-invalid' : '' ?>" type="number" name="warna" placeholder="warna" value="<?php echo $bobot->warna ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('warna') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="aksesibilitas">Kriteria 4 (Aksebilitas)</label></b>
									<input class="form-control <?php echo form_error('aksesibilitas') ? 'is-invalid' : '' ?>" type="number" name="aksesibilitas" placeholder="aksesibilitas" value="<?php echo $bobot->aksesibilitas ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('aksesibilitas') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="packaging">Kriteria 5 (Packaging)</label></b>
									<input class="form-control <?php echo form_error('packaging') ? 'is-invalid' : '' ?>" type="number" name="packaging" placeholder="packaging" value="<?php echo $bobot->packaging ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('packaging') ?>
									</div>
								</div>

								<div class="form-group">
									<b><label for="konsistensi">Kriteria 6 (Konsistensi)</label></b>
									<input class="form-control <?php echo form_error('konsistensi') ? 'is-invalid' : '' ?>" type="number" name="konsistensi" placeholder="konsistensi" value="<?php echo $bobot->konsistensi ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('konsistensi') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="harga">Kriteria 7 (Harga)</label></b>
									<input class="form-control <?php echo form_error('harga') ? 'is-invalid' : '' ?>" type="number" name="harga" placeholder="harga" value="<?php echo $bobot->harga ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('harga') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="fleksibilitas">Kriteria 8 (Fleksibilitas Pembayaran)</label></b>
									<input class="form-control <?php echo form_error('fleksibilitas') ? 'is-invalid' : '' ?>" type="number" name="fleksibilitas" placeholder="fleksibilitas" value="<?php echo $bobot->fleksibilitas ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('fleksibilitas') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="garansi">Kriteria 9 (Garansi)</label></b>
									<input class="form-control <?php echo form_error('garansi') ? 'is-invalid' : '' ?>" type="number" name="garansi" placeholder="garansi" value="<?php echo $bobot->garansi ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('garansi') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="jarak">Kriteria 10 (Jarak)</label></b>
									<input class="form-control <?php echo form_error('jarak') ? 'is-invalid' : '' ?>" type="number" name="jarak" placeholder="jarak" value="<?php echo $bobot->jarak ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('jarak') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="lokasi">Kriteria 11 (Lokasi)</label></b>
									<input class="form-control <?php echo form_error('lokasi') ? 'is-invalid' : '' ?>" type="number" name="lokasi" placeholder="lokasi" value="<?php echo $bobot->lokasi ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('lokasi') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="legalitas">Kriteria 12 (Legalitas)</label></b>
									<input class="form-control <?php echo form_error('legalitas') ? 'is-invalid' : '' ?>" type="number" name="legalitas" placeholder="legalitas" value="<?php echo $bobot->legalitas ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('legalitas') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="manajerial">Kriteria 13 (Manajerial)</label></b>
									<input class="form-control <?php echo form_error('manajerial') ? 'is-invalid' : '' ?>" type="number" name="manajerial" placeholder="manajerial" value="<?php echo $bobot->manajerial ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('manajerial') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="komunikasi">Kriteria 14 (Komunikasi)</label></b>
									<input class="form-control <?php echo form_error('komunikasi') ? 'is-invalid' : '' ?>" type="number" name="komunikasi" placeholder="komunikasi" value="<?php echo $bobot->komunikasi ?>" min="1" max="5" />
									<div class="invalid-feedback">
										<?php echo form_error('komunikasi') ?>
									</div>
								</div>


								<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
							</form>

						</div>

						<div class="card-footer small text-muted">
							* required fields
						</div>
					</div>
					<!-- DataTables -->
					<div class="card mb-3">
						<div class="card-header">
							<h4 class="m-0 font-weight-bold text-primary">Tingkat Kepentingan Bobot Kriteria</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<form class="form-inline">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr style="background-color:#FFD700;">
												<th style="text-align:center">Bobot</th>
												<th style="text-align:center">Tingkat Prioritas Bobot</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="text-align:center" width="150">
													1
												</td>
												<td style="text-align:center" width="150">
													Tidak Penting
												</td>
											</tr>
											<tr>
												<td style="text-align:center" width="150">
													2
												</td>
												<td style="text-align:center" width="150">
													Kurang Penting
												</td>
											</tr>
											<tr>
												<td style="text-align:center" width="150">
													3
												</td>
												<td style="text-align:center" width="150">
													Cukup Penting
												</td>
											</tr>
											<tr>
												<td style="text-align:center" width="150">
													4
												</td>
												<td style="text-align:center" width="150">
													Penting
												</td>
											</tr>
											<tr>
												<td style="text-align:center" width="150">
													5
												</td>
												<td style="text-align:center" width="150">
													Sangat Penting
												</td>
											</tr>


										</tbody>
									</table>
							</div>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->
		</div>
		<!-- End of Content Wrapper -->

		<!-- Footer -->
		<!-- <?php $this->load->view("footer.php") ?> -->
		<!-- End of Footer -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<?php $this->load->view("jsload.php") ?>

</body>

</html>