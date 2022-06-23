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

				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Input Nilai Kriteria</h1>
					</div>



					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<!-- Card  -->
					<div class="card mb-3">
						<div class="card-header">

							<a href="<?php echo site_url('nilai/') ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
						</div>
						<div class="card-body">

							<form action="<?=base_url('nilai/UpdateNilai')?>" method="post" enctype="multipart/form-data">
								<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/nilai/edit/ID --->

								<input type="hidden" name="id" value="<?php echo $nilai->id_nilai ?>" />
								<input type="hidden" name="id_supplier" value="<?php echo $nilai->id_supplier ?>" />
								<input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
								<div class="form-group">
									<b><label for="tahun">Tahun</label></b>

									<select class="form-control " name="tahun">
										<option>---Pilih Tahun---</option>
										<?php
										for ($i = 2021; $i <= 2030; $i++) {
											echo "<option value='$i'";
											if ($nilai->tahun == $i) {
												echo " selected";
											}
											echo ">$i</option>";
										}
										?>

									</select>

									<div class="invalid-feedback"></div>
								</div>
								<div class="form-group">
									<b><label for="periode">Periode</label></b>
									<select class="form-control " name="periode">
										<option>---Pilih Periode---</option>
										<?php
										for ($i = 1; $i <= 2; $i++) {
											echo "<option value='$i'";
											if ($nilai->periode == $i) {
												echo " selected";
											}
											echo ">$i</option>";
										}
										?>

									</select>
									<div class="invalid-feedback"></div>
								</div>
								<div class="form-group">
									<b><label for="rasa">Kriteria 1 (Rasa)</label></b>
									<!--<input class="form-control <?php echo form_error('rasa') ? 'is-invalid' : '' ?>"
								 type="text" name="rasa" placeholder="rasa" value="<?php echo $nilai->rasa ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('rasa') ?>
								</div>
								-->
									<select name="rasa" class="form-control">
										<option>--- Pilih Nilai Kriteria Rasa ---</option>
										<option value="1" <?php if ($nilai->rasa == '1') {
																echo "selected";
															} ?>>Rasa manis tertinggal di lidah dan berubah ketika disimpan</option>
										<option value="2" <?php if ($nilai->rasa == '2') {
																echo "selected";
															} ?>>Rasa manis tertinggal di lidah, namun tidak berubah ketika disimpan</option>
										<option value="3" <?php if ($nilai->rasa == '3') {
																echo "selected";
															} ?>>Rasa manis konsisten</option>
										<option value="4" <?php if ($nilai->rasa == '4') {
																echo "selected";
															} ?>>Rasa manis konsisten dan tidak berubah ketika disimpan</option>
										<option value="5" <?php if ($nilai->rasa == '5') {
																echo "selected";
															} ?>>Rasa manis dan tidak tertinggal di lidah atau tenggorokan, tidak berubah rasa ketika disimpan</option>
									</select>
								</div>

								<div class="form-group">
									<b><label for="aroma">Kriteria 2 (Aroma)</label></b>
									<!--<input class="form-control <?php echo form_error('aroma') ? 'is-invalid' : '' ?>"
								 type="text" name="aroma" placeholder="aroma" value="<?php echo $nilai->aroma ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('aroma') ?>
								</div>-->
									<select name="aroma" class="form-control">
										<option>--- Pilih Nilai Kriteria Aroma ---</option>
										<option value="1" <?php if ($nilai->aroma == '1') {
																echo "selected";
															} ?>>Aroma Nektar Bunga sangat tidak kuat</option>
										<option value="2" <?php if ($nilai->aroma == '2') {
																echo "selected";
															} ?>>Aroma Nektar Bunga tidak kuat</option>
										<option value="3" <?php if ($nilai->aroma == '3') {
																echo "selected";
															} ?>>Aroma Nektar Bunga beraroma sedang</option>
										<option value="4" <?php if ($nilai->aroma == '4') {
																echo "selected";
															} ?>>Aroma Nektar Bunga yang kuat</option>
										<option value="5" <?php if ($nilai->aroma == '5') {
																echo "selected";
															} ?>>Aroma Nektar Bunga yang sangat kuat</option>
									</select>
								</div>

								<div class="form-group">
									<b><label for="warna">Kriteria 3 (Warna)</label></b>
									<!--<input class="form-control <?php echo form_error('warna') ? 'is-invalid' : '' ?>"
								 type="text" name="warna" placeholder="warna" value="<?php echo $nilai->warna ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('warna') ?>
								</div>-->
									<select name="warna" class="form-control">
										<option>--- Pilih Nilai Kriteria Warna ---</option>
										<option value="1" <?php if ($nilai->warna == '1') {
																echo "selected";
															} ?>>Dark Amber</option>
										<option value="2" <?php if ($nilai->warna == '2') {
																echo "selected";
															} ?>>Amber</option>
										<option value="3" <?php if ($nilai->warna == '3') {
																echo "selected";
															} ?>>Light Amber</option>
										<option value="4" <?php if ($nilai->warna == '4') {
																echo "selected";
															} ?>>Extra White</option>
										<option value="5" <?php if ($nilai->warna == '5') {
																echo "selected";
															} ?>>Water White</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="aksesibilitas">Kriteria 4 (Aksesibilitas)</label></b>
									<!--<input class="form-control <?php echo form_error('aksesibilitas') ? 'is-invalid' : '' ?>"
								 type="text" name="aksesibilitas" placeholder="aksesibilitas" value="<?php echo $nilai->aksesibilitas ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('aksesibilitas') ?>
								</div>-->
									<select name="aksesibilitas" class="form-control">
										<option>--- Pilih Nilai Kriteria Aksesibilitas ---</option>
										<option value="1" <?php if ($nilai->aksesibilitas == '1') {
																echo "selected";
															} ?>>Pengiriman hanya dapat dilakukan menggunakan roda 2</option>
										<option value="2" <?php if ($nilai->aksesibilitas == '2') {
																echo "selected";
															} ?>>Pengiriman dapat dilakukan menggunakan roda 4</option>
										<option value="3" <?php if ($nilai->aksesibilitas == '3') {
																echo "selected";
															} ?>>Pengiriman hanya dapat dilakukan menggunakan ekspedisi darat</option>
										<option value="4" <?php if ($nilai->aksesibilitas == '4') {
																echo "selected";
															} ?>>Pengiriman dapat dilakukan menggunakan ekspedisi hanya dengan 2 moda transportasi (darat, laut, udara)</option>
										<option value="5" <?php if ($nilai->aksesibilitas == '5') {
																echo "selected";
															} ?>>Pengiriman dilakukan dengan menggunakan ekspedisi pada seluruh moda transportasi</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="packaging">Kriteria 5 (Packaging)</label></b>
									<!--<input class="form-control <?php echo form_error('packaging') ? 'is-invalid' : '' ?>"
								 type="text" name="packaging" placeholder="packaging" value="<?php echo $nilai->packaging ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('packaging') ?>
								</div>-->
									<select name="packaging" class="form-control">
										<option>--- Pilih Nilai Kriteria Packaging ---</option>
										<option value="1" <?php if ($nilai->packaging == '1') {
																echo "selected";
															} ?>>Pengemasan tidak aman dan kotor</option>
										<option value="2" <?php if ($nilai->packaging == '2') {
																echo "selected";
															} ?>>Pengemasan kurang aman dan kurang bersih</option>
										<option value="3" <?php if ($nilai->packaging == '3') {
																echo "selected";
															} ?>>Pengemasan aman tetapi kurang bersih</option>
										<option value="4" <?php if ($nilai->packaging == '4') {
																echo "selected";
															} ?>>Pengemasan aman dan bersih</option>
										<option value="5" <?php if ($nilai->packaging == '5') {
																echo "selected";
															} ?>>Pengemasan aman dan sangat bersih</option>
									</select>
								</div>

								<div class="form-group">
									<b><label for="konsistensi">Kriteria 6 (Konsistensi)</label></b>
									<!--<input class="form-control <?php echo form_error('konsistensi') ? 'is-invalid' : '' ?>"
								 type="text" name="konsistensi" placeholder="konsistensi" value="<?php echo $nilai->konsistensi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('konsistensi') ?>
								</div>-->
									<select name="konsistensi" class="form-control">"><option>--- Pilih Nilai Kriteria Konsistensi ---</option>
										<option value="1" <?php if ($nilai->konsistensi == '1') {
																echo "selected";
															} ?>>Perusahaan melakukan pengiriman dengan konsistensi sangat rendah</option>
										<option value="2" <?php if ($nilai->konsistensi == '2') {
																echo "selected";
															} ?>>Perusahaan melakukan pengiriman dengan konsistensi rendah</option>
										<option value="3" <?php if ($nilai->konsistensi == '3') {
																echo "selected";
															} ?>>Perusahaan melakukan pengiriman dengan konsistensi cukup tinggi</option>
										<option value="4" <?php if ($nilai->konsistensi == '4') {
																echo "selected";
															} ?>>Perusahaan melakukan pengiriman dengan konsistensi tinggi</option>
										<option value="5" <?php if ($nilai->konsistensi == '5') {
																echo "selected";
															} ?>>Perusahaan melakukan pengiriman dengan konsistensi sangat tinggi</option>
									</select>
								</div>

								<div class="form-group">
									<b><label for="harga">Kriteria 7 (Harga)</label></b>
									<!--<input class="form-control <?php echo form_error('harga') ? 'is-invalid' : '' ?>"
								 type="text" name="harga" placeholder="harga" value="<?php echo $nilai->harga ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>-->
									<select name="harga" class="form-control">
										<option>--- Pilih Nilai Kriteria Harga ---</option>
										<option value="1" <?php if ($nilai->harga == '1') {
																echo "selected";
															} ?>>Produk memiliki harga yang lebih rendah dengan potongan harga perjumlah tertentu</option>
										<option value="2" <?php if ($nilai->harga == '2') {
																echo "selected";
															} ?>>Produk memiliki harga yang lebih rendah</option>
										<option value="3" <?php if ($nilai->harga == '3') {
																echo "selected";
															} ?>>Produk hanya menawarkan diskon harga perjumlah tertentu</option>
										<option value="4" <?php if ($nilai->harga == '4') {
																echo "selected";
															} ?>>Produk memiliki harga yang sama dengan supplier lain</option>
										<option value="5" <?php if ($nilai->harga == '6') {
																echo "selected";
															} ?>>Produk memiliki harga yang lebih tinggi dibandingkan supplier lain</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="fleksibilitas">Kriteria 8 (Fleksibilitas Pembayaran)</label></b>
									<!--<input class="form-control <?php echo form_error('fleksibilitas') ? 'is-invalid' : '' ?>"
								 type="text" name="fleksibilitas" placeholder="fleksibilitas" value="<?php echo $nilai->fleksibilitas ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('fleksibilitas') ?>
								</div>-->
									<select name="fleksibilitas" class="form-control">
										<option>--- Pilih Nilai Kriteria Fleksibilitas Pembayaran ---</option>
										<option value="1" <?php if ($nilai->fleksibilitas == '1') {
																echo "selected";
															} ?>>Harus dibayarkan penuh</option>
										<option value="2" <?php if ($nilai->fleksibilitas == '2') {
																echo "selected";
															} ?>>Harus dibayar 75% dari harga yang seharusnya dibayarakan</option>
										<option value="3" <?php if ($nilai->fleksibilitas == '3') {
																echo "selected";
															} ?>>Harus dibayar 50% dari harga yang seharusnya dibayarkan</option>
										<option value="4" <?php if ($nilai->fleksibilitas == '4') {
																echo "selected";
															} ?>>Harus dibayar 25% dari harga yang harus dibayarkan</option>
										<option value="5" <?php if ($nilai->fleksibilitas == '5') {
																echo "selected";
															} ?>>Dapat dibayar ketika produk tiba</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="garansi">Kriteria 9 (Garansi)</label></b>
									<!--<input class="form-control <?php echo form_error('garansi') ? 'is-invalid' : '' ?>"
								 type="text" name="garansi" placeholder="garansi" value="<?php echo $nilai->garansi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('garansi') ?>
								</div>-->
									<select name="garansi" class="form-control">"><option>--- Pilih Nilai Kriteria Garansi ---</option>
										<option value="1" <?php if ($nilai->garansi == '1') {
																echo "selected";
															} ?>>Produk yang rusak tidak diretur sama sekali</option>
										<option value="2" <?php if ($nilai->garansi == '2') {
																echo "selected";
															} ?>>Produk yang rusak di retur 25%</option>
										<option value="3" <?php if ($nilai->garansi == '3') {
																echo "selected";
															} ?>>Produk yang rusak di retur 50%</option>
										<option value="4" <?php if ($nilai->garansi == '4') {
																echo "selected";
															} ?>>Produk yang rusak di retur 75%</option>
										<option value="5" <?php if ($nilai->garansi == '5') {
																echo "selected";
															} ?>>Produk yang rusak diretur 100%</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="jarak">Kriteria 10 (Jarak)</label></b>
									<!--<input class="form-control <?php echo form_error('jarak') ? 'is-invalid' : '' ?>"
								 type="text" name="jarak" placeholder="jarak" value="<?php echo $nilai->jarak ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jarak') ?>
								</div-->
									<select name="jarak" class="form-control">
										<option>--- Pilih Nilai Kriteria Jarak ---</option>
										<option value="1" <?php if ($nilai->jarak == '1') {
																echo "selected";
															} ?>>Lokasi supplier 10-15 km</option>
										<option value="2" <?php if ($nilai->jarak == '2') {
																echo "selected";
															} ?>>Lokasi supplier 50-100 km</option>
										<option value="3" <?php if ($nilai->jarak == '3') {
																echo "selected";
															} ?>>Lokasi supplier 100-150 km</option>
										<option value="4" <?php if ($nilai->jarak == '4') {
																echo "selected";
															} ?>>Lokasi supplier 150-200 km</option>
										<option value="5" <?php if ($nilai->jarak == '5') {
																echo "selected";
															} ?>>Lokasi supplier >200km</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="lokasi">Kriteria 11 (Lokasi)</label></b>
									<!--<input class="form-control <?php echo form_error('lokasi') ? 'is-invalid' : '' ?>"
								 type="text" name="lokasi" placeholder="lokasi" value="<?php echo $nilai->lokasi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('lokasi') ?>
								</div>-->
									<select name="lokasi" class="form-control">
										<option>--- Pilih Nilai Kriteria Lokasi ---</option>
										<option value="1" <?php if ($nilai->lokasi == '1') {
																echo "selected";
															} ?>>Lokasi hanya bisa diakses roda 2 saja</option>
										<option value="2" <?php if ($nilai->lokasi == '2') {
																echo "selected";
															} ?>>Lokasi hanya bisa diakses roda 2 dan roda 4</option>
										<option value="3" <?php if ($nilai->lokasi == '3') {
																echo "selected";
															} ?>>Lokasi hanya bisa diakses melalui moda transportasi darat</option>
										<option value="4" <?php if ($nilai->lokasi == '4') {
																echo "selected";
															} ?>>Lokasi hanya bisa diakses dengan 2 moda transportasi (darat, laut, udara)</option>
										<option value="5" <?php if ($nilai->lokasi == '5') {
																echo "selected";
															} ?>>Lokasi bisa diakses semua moda transportasi</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="legalitas">Kriteria 12 (Legalitas)</label></b>
									<!--<input class="form-control <?php echo form_error('legalitas') ? 'is-invalid' : '' ?>"
								 type="text" name="legalitas" placeholder="legalitas" value="<?php echo $nilai->legalitas ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('legalitas') ?>
								</div>-->
									<select name="legalitas" class="form-control">
										<option>--- Pilih Nilai Kriteria Legalitas ---</option>
										<option value="1" <?php if ($nilai->legalitas == '1') {
																echo "selected";
															} ?>>Perusahaan tidak memiliki legalitas dan hanya dikenal sedikit masyarakat</option>
										<option value="2" <?php if ($nilai->legalitas == '2') {
																echo "selected";
															} ?>>Perusahaan dikenal banyak masyarakat namun belum memiliki legalitas resmi</option>
										<option value="3" <?php if ($nilai->legalitas == '3') {
																echo "selected";
															} ?>>Perusahaan hanya memiliki legalitas dari BPOM</option>
										<option value="4" <?php if ($nilai->legalitas == '4') {
																echo "selected";
															} ?>>Perusahaan hanya dikenal orang di daerah sekitarnya dan memiliki legalias resmi BPOM</option>
										<option value="5" <?php if ($nilai->legalitas == '5') {
																echo "selected";
															} ?>>Perusahaan dikenal banyak orang dan memiliki legalitas resmi dari BPOM</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="manajerial">Kriteria 13 (Manajerial)</label></b>
									<!--<input class="form-control <?php echo form_error('manajerial') ? 'is-invalid' : '' ?>"
								 type="text" name="manajerial" placeholder="manajerial" value="<?php echo $nilai->manajerial ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('manajerial') ?>
								</div>-->
									<select name="manajerial" class="form-control">
										<option>--- Pilih Nilai Kriteria Manajerial ---</option>
										<option value="1" <?php if ($nilai->manajerial == '1') {
																echo "selected";
															} ?>>Supplier memiliki manajerial yang sangat buruk</option>
										<option value="2" <?php if ($nilai->manajerial == '2') {
																echo "selected";
															} ?>>Supplier memiliki manajerial yang buruk</option>
										<option value="3" <?php if ($nilai->manajerial == '3') {
																echo "selected";
															} ?>>Supplier memiliki manajerial yang baik</option>
										<option value="4" <?php if ($nilai->manajerial == '4') {
																echo "selected";
															} ?>>Supplier memiliki manajerial yang sangat baik</option>
										<option value="5" <?php if ($nilai->manajerial == '5') {
																echo "selected";
															} ?>>Supplier memiliki manajerial yang sangat baik sekali</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="komunikasi">Kriteria 14 (Komunikasi)</label></b>
									<!--<input class="form-control <?php echo form_error('komunikasi') ? 'is-invalid' : '' ?>"
								 type="text" name="komunikasi" placeholder="komunikasi" value="<?php echo $nilai->komunikasi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('komunikasi') ?>
								</div>-->
									<select name="komunikasi" class="form-control">
										<option>--- Pilih Nilai Kriteria Komunikasi ---</option>
										<option value="1" <?php if ($nilai->komunikasi == '1') {
																echo "selected";
															} ?>>Supplier memiliki komunikasi yang sangat buruk</option>
										<option value="2" <?php if ($nilai->komunikasi == '2') {
																echo "selected";
															} ?>>Supplier memiliki komunikasi yang buruk</option>
										<option value="3" <?php if ($nilai->komunikasi == '3') {
																echo "selected";
															} ?>>Supplier memiliki komunikasi yang baik</option>
										<option value="4" <?php if ($nilai->komunikasi == '4') {
																echo "selected";
															} ?>>Supplier memiliki komunikasi yang sangat baik</option>
										<option value="5" <?php if ($nilai->komunikasi == '5') {
																echo "selected";
															} ?>>Supplier memiliki komunikasi yang sangat baik sekali</option>
									</select>
								</div>


								<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
							</form>

						</div>

						<div class="card-footer small text-muted">
							* required fields
						</div>


					</div>
					<!-- /.container-fluid -->

					<!-- Sticky Footer -->


				</div>


			</div>
			<!-- /.content-wrapper -->

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