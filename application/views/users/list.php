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
                                    <!--<button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i> 
                                    </button>-->
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
                        <h2 class="m-0 font-weight-bold text-primary">Data User</h2>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <!-- <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4"> -->

                        <!-- Card Body -->
                        <div class="card-body">
                            <!------------------------->

                            <div id="wrapper">

                                <div id="content-wrapper">

                                    <!-- DataTales Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <a href="<?php echo site_url('users/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i> Tambah Data User</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <form action="" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr style="background-color:#f6c23e;">
                                                            <th style="text-align:center"><strong>No</strong></th>
                                                            <th style="text-align:center"><strong>Nama</strong></th>
                                                            <th style="text-align:center"><strong>Username</strong></th>
                                                            <!-- <th style="text-align:center">Password</th> -->
                                                            <th style="text-align:center"><strong>Aksi</strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1;
                                                        foreach ($users as $usr) : ?>
                                                            <tr>
                                                                <td style="text-align:center" width="100">
                                                                    <?= $no++; ?>
                                                                <td style="text-align:center" width="250">
                                                                    <?php echo $usr->nama ?>
                                                                </td>
                                                                <td style="text-align:center" width="250">
                                                                    <?php echo $usr->username ?>
                                                                </td>
                                                                <!-- <td style="text-align:center" width="250">
                                                                    *****
                                                                </td> -->
                                                                <td style="text-align:center" width="250">
                                                                    <a href="<?php echo site_url('users/edit/' . $usr->id_users) ?>" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-fw fa-pen"></i></a>
                                                                    <a onclick="if (confirm('Benarkah ingin menghapus?')){return true;}else{event.stopPropagation(); event.preventDefault();};" title="Hapus" href="<?php echo site_url('users/delete/' . $usr->id_users) ?>" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
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

                                <!-- /.content-wrapper -->

                            </div>
                            <!-- /#wrapper -->
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