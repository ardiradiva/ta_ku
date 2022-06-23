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
						<form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
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
                                     <!------------------------- ->
									 
	<div id="wrapper">

		

		<div id="content-wrapper">

			<div class="container-fluid">

				


				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						Data Kejahatan di Kota Ternate
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kejahatan</th>
										<th>Ternate Utara</th>
										<th>Ternate Tengah</th>
										<th>Ternate Selatan</th>
									</tr>
								</thead>
								<tbody>
									<?php $total_utara=0;$total_tengah=0;$total_selatan=0;$matrix=array();$no=0;$dt_kejahatan=array();?>
									<?php foreach ($kejahatan as $kejahatan): ?>
									<tr>
										<td width="150">
											<?php echo $kejahatan->kejahatan ?>
										</td>
										<td>
											<?php echo $kejahatan->ternate_utara ?>
										</td>
										<td>
											<?php echo $kejahatan->ternate_tengah ?>
										</td>
										<td>
											<?php echo $kejahatan->ternate_selatan ?>
										</td>
									</tr>
									<?php 
										$dt_kejahatan[]=$kejahatan->kejahatan;
										$matrix[$no]=array($kejahatan->ternate_utara,$kejahatan->ternate_tengah,$kejahatan->ternate_selatan);
										$no++;
										$total_utara+=$kejahatan->ternate_utara;
										$total_tengah+=$kejahatan->ternate_tengah;
										$total_selatan+=$kejahatan->ternate_selatan;
										if($total_utara<50){$alert_utara="bg-gradient-success";$status_utara="Cukup Rawan";}
										elseif($total_utara>100){$alert_utara="bg-gradient-danger";$status_utara="Sangat Rawan";}
										else{$alert_utara="bg-gradient-warning";$status_utara="Rawan";}
										if($total_tengah<50){$alert_tengah="bg-gradient-success";$status_tengah="Cukup Rawan";}
										elseif($total_tengah>100){$alert_tengah="bg-gradient-danger";$status_tengah="Sangat Rawan";}
										else{$alert_tengah="bg-gradient-warning";$status_tengah="Rawan";}
										if($total_selatan<50){$alert_selatan="bg-gradient-success";$status_selatan="Cukup Rawan";}
										elseif($total_selatan>100){$alert_selatan="bg-gradient-danger";$status_selatan="Sangat Rawan";}
										else{$alert_selatan="bg-gradient-warning";$status_selatan="Rawan";}
									?>
									<?php endforeach; ?>
								
								</tbody>
								<thead>
								<tr>
										<th width="150">
											Total
										</th>
										<th >
											<?php echo $total_utara ?>
										</th>
										<th >
											<?php echo $total_tengah ?>
										</th>
										<th >
											<?php echo $total_selatan ?>
										</th>
									</tr>
								<tr>
										<th width="150">
											Status
										</th>
										<th class="<?php echo $alert_utara;?>">
											<?php echo $status_utara ?>
										</th>
										<th class="<?php echo $alert_tengah;?>">
											<?php echo $status_tengah ?>
										</th>
										<th class="<?php echo $alert_selatan;?>">
											<?php echo $status_selatan ?>
										</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>


				<?php 
					$md_matrix=array();$jum=array();$no=0;
					for($i=0;$i<count($matrix);$i++){
						$md_matrix[$no]=array();
						for($j=0;$j<count($matrix);$j++){
							$jum[$no]=0;
							if($j>$i){
							for($k=0;$k<3;$k++)
							{
								$md_matrix[$no][$k]=abs($matrix[$i][$k]-$matrix[$j][$k]);
							}
							$md_matrix[$no][]=$i;$md_matrix[$no][]=$j;
							//echo implode("|",$md_matrix[$no]);
							$no++;
							
							}
							//echo "<br>";
							
						}
						//echo "<hr>";
					}
					//$md_matrix = array_filter($md_matrix, '');
					//print_r($md_matrix);
				?>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						Menghitung Jarak
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Manhattan Distance</th>
										<th>Ternate Utara (D1)</th>
										<th>Ternate Tengah (D2)</th>
										<th>Ternate Selatan (D3)</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$tb_matrix=array();
									for($i=0;$i<count($matrix);$i++){
										for($j=0;$j<count($matrix);$j++){
											$tb_matrix[$i][$j]=0;
										}
									}
									for($i=0;$i<count($md_matrix);$i++){
										if(!empty($md_matrix[$i])){
											$dari=$md_matrix[$i][3];$ke=$md_matrix[$i][4];
											$jm_jarak=$md_matrix[$i][0]+$md_matrix[$i][1]+$md_matrix[$i][2];
									echo "
									<tr>
										<td width='150'>
											".($dari+1)." -> ".($ke+1)."
										</td>
										<td>
											".$md_matrix[$i][0]."
										</td>
										<td>
											".$md_matrix[$i][1]."
										</td>
										<td>
											".$md_matrix[$i][2]."
										</td>
										<td>
											".$jm_jarak."
										</td>
									</tr>";
										$tb_matrix[$dari][$ke]=$jm_jarak;
										$tb_matrix[$ke][$dari]=$jm_jarak;
										}
									}
									?>
									
								
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						Menghitung Tabel Matrix
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Matrix Jarak Manhattan</th>
										<?php 
											for($i=0;$i<count($dt_kejahatan);$i++){
												echo "<th>".$dt_kejahatan[$i]."</th>";
											}
										?>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$terkecil=1000;
									$k_terkecil=array();
									$jml_distance=array();
									for($i=0;$i<count($dt_kejahatan);$i++){
										
									
									echo "
									<tr>
										<td width='150'>
											".$dt_kejahatan[$i]."
										</td>";
										$jmld=0;
										for($j=0;$j<count($dt_kejahatan);$j++){
											echo "<td>".$tb_matrix[$j][$i]."</td>";
											$jmld+=$tb_matrix[$j][$i];
										}
										$jml_distance[$i]=$jmld;
										if($jmld<$terkecil){$terkecil=$jmld;}
										
echo "										<td>
											$jmld
										</td>
									</tr>";
									}
									
									?>
									
								
								</tbody>
								
							</table>
						</div>
					</div>
				</div>

				<?php 
					
					for($i=0;$i<count($dt_kejahatan);$i++){
						if($jml_distance[$i]==$terkecil){
							$k_terkecil[]=$i;
							
						}
					}
					$dtm_terkecil=array();
					$min1=array();$min2=array();$min3=array();
					for($i=0;$i<count($k_terkecil);$i++){
						$idkm=$k_terkecil[$i];
						$min1[]=$tb_matrix[$idkm][0];
						$min2[]=$tb_matrix[$idkm][1];
						$min3[]=$tb_matrix[$idkm][2];
					}
					$nilaiX[]=min($min1);
					$nilaiX[]=min($min2);
					$nilaiX[]=min($min3);
					$mx=array();
					for($i=0;$i<count($nilaiX);$i++){
						$mx[$i]=array();
						for($j=0;$j<count($nilaiX);$j++){
							$mx[$i][$j]=abs($nilaiX[$i]-$nilaiX[$j]);
						}
					}
				?>


				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						Single Linkage
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Single Linkage</th>
										<?php 
											for($i=0;$i<count($nilaiX);$i++){
													echo "<th>X".$i."</th>";
											}
										?>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$xjumlah=array();
									
									for($i=0;$i<count($nilaiX);$i++){
										
									
									echo "
									<tr>
										<td width='150'>
										X".$i."
										</td>";
										$xjumlah[$i]=0;
										for($j=0;$j<count($mx);$j++){
											echo "<td>".$mx[$i][$j]."</td>";
											$xjumlah[$i]+=$mx[$i][$j];
										}
										
											
										
echo "									<td>	".$xjumlah[$i]."
								
										</td>
										
									</tr>";
									}
									
									?>
									
								
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
				
				<?php 
				$mintjumlah=min($xjumlah);
				$minjumlah=array();
				for($i=0;$i<count($xjumlah);$i++){
					if($mintjumlah==$xjumlah[$i]){
						$minjumlah[]=$i;
					}
				}
				?>
	

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						Single Linkage Iterasi 1
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Single Linkage Iterasi 1</th>
										<?php 
											for($i=0;$i<count($mx);$i++){
													echo "<th>X".$i."</th>";
											}
										?>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$xjumlah=array();
									
									for($i=0;$i<count($minjumlah);$i++){
										
									$idx=$minjumlah[$i];
									echo "
									<tr>
										<td width='150'>
										X".$i."
										</td>";
										$xjumlah[$i]=0;
										for($j=0;$j<count($mx);$j++){
											echo "<td>".$mx[$idx][$j]."</td>";
											
										}
										
											
										
echo "									<td>	".$xjumlah[$i]."
								
										</td>
										
									</tr>";
									}
									
									?>
									
								
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