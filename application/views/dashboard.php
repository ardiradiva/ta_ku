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

                <?php
                $n_admin = 0;
                foreach ($admin as $admin) :
                    $n_admin++;
                endforeach;
                $n_supplier = 0;
                foreach ($supplier as $supplier) :
                    $n_supplier++;
                endforeach;
                $n_users = 0;
                foreach ($users as $users) :
                    $n_users++;
                endforeach;
                $n_bobot = 0;
                foreach ($bobot as $bobot) :
                    $n_bobot++;
                endforeach;
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="m-0 font-weight-bold text-primary">Dashboard</h2>
                    </div>

                    <!-- Content Row -->
                    <div class='row'>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-primary shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>
                                                Admin</div>
                                            <div class='h5 mb-0 font-weight-bold text-gray-800'><?php echo $n_admin; ?></div>
                                        </div>
                                        <div class='col-auto'>
                                            <i class='fas fa-user fa-2x text-gray-300'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-success shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <div class='text-xs font-weight-bold text-success text-uppercase mb-1'>
                                                Supplier</div>
                                            <div class='h5 mb-0 font-weight-bold text-gray-800'><?php echo $n_supplier; ?></div>
                                        </div>
                                        <div class='col-auto'>
                                            <i class='fas fa-industry fa-2x text-gray-300'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-info shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <div class='text-xs font-weight-bold text-info text-uppercase mb-1'>Users
                                            </div>
                                            <div class='row no-gutters align-items-center'>
                                                <div class='col-auto'>
                                                    <div class='h5 mb-0 mr-3 font-weight-bold text-gray-800'><?php echo $n_users; ?></div>
                                                </div>
                                                <div class='col'>
                                                    <div class='progress progress-sm mr-2'>
                                                        <div class='progress-bar bg-info' role='progressbar' style='width: 50%' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100'></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <i class='fas fa-users fa-2x text-gray-300'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-warning shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <div class='text-xs font-weight-bold text-warning text-uppercase mb-1'>
                                                Bobot</div>
                                            <div class='h5 mb-0 font-weight-bold text-gray-800'><?php echo $n_bobot; ?></div>
                                        </div>
                                        <div class='col-auto'>
                                            <i class='fas fa-weight fa-2x text-gray-300'></i>
                                        </div>
                                    </div>
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <?php $this->load->view("jsload.php") ?>

</body>

</html>