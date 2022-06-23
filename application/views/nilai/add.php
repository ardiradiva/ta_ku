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

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<li class="nav-item no-arrow">
							<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
								<div class="input-group">
									<!-- <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2"> -->
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

				<div class="container-fluid">



					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<div class="card mb-3">
						<div class="card-header">
							<a href="<?php echo site_url('nilai/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
						</div>
						<div class="card-body">

							<form action="<?php echo site_url('nilai/add') ?>" method="post" enctype="multipart/form-data">

								<!-- 
							rasa	aroma	warna	aksesibilitas	packaging	konsistensi	harga	fleksibilitas	garansi	jarak	lokasi	legalitas	manajerial	komunikasi	
							-->
								<div class="form-group">
									<label for="nilai">Rasa</label>
									<input class="form-control <?php echo form_error('nilai') ? 'is-invalid' : '' ?>" type="text" name="nilai" placeholder="Nama" />
									<div class="invalid-feedback">
										<?php echo form_error('nilai') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="username">Ternate Utara</label>
									<input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" type="number" name="username" min="0" placeholder="Ternate Utara" />
									<div class="invalid-feedback">
										<?php echo form_error('username') ?>
									</div>
								</div>
								<div class="form-group">
									<label for="password">Ternate Tengah</label>
									<input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="number" name="password" min="0" placeholder="Ternate Tengah" />
									<div class="invalid-feedback">
										<?php echo form_error('password') ?>
									</div>
								</div>


								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</form>

						</div>

						<div class="card-footer small text-muted">
							* required fields
						</div>


					</div>
					<!-- /.container-fluid -->

				</div>


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