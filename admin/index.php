<?php
$title = "Bumi Kaltara";
session_start();
require 'function.php';
if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}
$jumArt = count(data("SELECT * FROM artikel"));

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom styles for this template-->
    <link href="http://localhost/FPWEB/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost/FPWEB/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/FPWEB/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/FPWEB/admin/index.php">

                <div class="sidebar-brand-text mx-3">Wisata Kaltara</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/FPWEB/admin/tempat/index.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Tempat Wisata</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form action="" method="post" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="katakunci">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="searchCbg">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!--- <span class="mr-2 d-none d-lg-inline text-white small"></span> --->
                            <i class="rounded-circle fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="http://localhost/FPWEB/admin/regis.php">
                                <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                                Tambah User
                            </a>
                            <a class="dropdown-item" href="http://localhost/FPWEB/admin/changePass.php">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ganti Password
                            </a>
                            <a class="dropdown-item" onclick="return confirm('Anda yakin ingin keluar dari halaman ini??');" href="http://localhost/FPWEB/admin/LogOut.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tempat Wisata</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $jumArt; ?>
                                                </div>
                                            </div>
                                        <div class="col-auto">
                                            <i class="fas fa-map-marker-alt mr-1 text-success"></i>
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

        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-dark">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span class="text-light">Copyright &copy; Kelompok cempedak <?= date('Y'); ?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->

        <script src="http://localhost/FPWEB/assets/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="http://localhost/FPWEB/assets/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="http://localhost/FPWEB/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
