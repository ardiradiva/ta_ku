<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion navbar-fixed" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img class="img-profile rounded-circle" src="<?= base_url("assets"); ?>/img/logokecil.jpg">
        </div>
    </a>
    <!-- <div class="sidebar-brand-text mx-3">Sistem Rekomendasi</div> -->
    <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="text-align:center">
        Sistem Rekomendasi Pemilihan Supplier Madu CV.RIZKY BAROKAH MENGGUNAKAN METODE WP</div>
    <br>
	
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url("dashboard"); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
			
    </li>
    <?php if ($this->session->userdata('level') == 'admin') { ?>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url("users"); ?>">
                <i class="fa fa-users"></i>
                <span> Data Users</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url("supplier"); ?>">
                <i class="fa fa-industry"></i>
                <span> Data Supplier</span></a>
        </li>
        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url("bobot/edit/BT00001"); ?>">
                <i class="fa fa-weight-hanging"></i>
                <span> Pengaturan Bobot</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url("wp"); ?>">
                <i class="fas fa-fw fa-calculator"></i>
                <span> Hasil Rekomendasi</span></a>
        </li>

    <?php } else { ?>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url("nilai"); ?>">
                <i class="fas fa-award"></i>
                <span> Penilaian Kriteria Supplier</span></a>
        </li>
    <?php } ?>

    </li>
    <li class="nav-item active">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- <div class="text-center d-none d-md-inline mt-3 mb-3">
                <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->