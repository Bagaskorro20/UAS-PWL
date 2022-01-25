<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../../login.php");
    exit;
}
require '../function.php';
$idArtikel = $_GET["id"];
$point = data("SELECT * FROM artikel WHERE id='$idArtikel'")[0];
$title = "Sona Wisata | " . $point['tempat'];
$artikel = data("SELECT * FROM artikel WHERE id='$idArtikel'");
if (isset($_POST["editArtikel"])) {
    if (editArtikel($_POST) > 0) {
        echo "
      <script>
        alert('Data berhasil diupdate');
        document.location.href = 'index.php';
      </script>
      ";
    } else {
        echo "
      <script>
        alert('Data gagal diupdate');
        document.location.href = 'index.php';
      </script>
      ";
    }
}
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

    <!-- Custom fonts for this template-->
    <link href="http://localhost/FPWEB/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="http://localhost/FPWEB/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost/FPWEB/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/FPWEB/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Theme style -->

<script src="http://localhost/FPWEB/assets/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="http://localhost/FPWEB/assets/fontawesome-free/css/all.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/FPWEB/admin/index.php">

                <div class="sidebar-brand-text mx-3">SonaWisata</div>
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
                <?php
                if ($title == "Wisata Kaltara | Home Admin") {
                    include 'cardinfo.php';
                    # code...
                }
                ?>
                <!-- /.container-fluid -->

            </div>
<!-- End of Main Content -->
<?php
foreach ($artikel as $brs) : 
?>

    <div class="modal fade" id="artikelEditModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit Tempat Wisata</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $brs['id']; ?>" class="form-control">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" value="<?= $brs['author']; ?>" readonly name="author" id="author" class="form-control" autofocus="true" autocomplete="off" placeholder="Author" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?= $brs['tempat']; ?>" readonly name="nam" id="nam" class="form-control" autofocus="true" autocomplete="off" placeholder="Nama Tempat Wisata" required>
                            </div>
                            <div class="form-group">
                                <input value="<?= $brs['lokasi']; ?>" readonly placeholder="Lokasi Tempat Wisata ( Desa/Kecamatan/Kabupaten )" type="text" name="lok" id="lok" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label><br>
                                <img src="foto/<?= $brs['foto']; ?>" style="width: 100px; height:100px;" alt="" class="mb-3">
                            </div>
                            <div class="form-group">
                                <label for="sts">Status</label>
                                <select class="custom-select" name="sts" id="sts" required>
                                    <?php
                                    if ($brs['sts'] ==  'approved') {
                                        echo "<option value='approved'>Approved</option>";
                                        echo "<option value='no yet approved'>no yet approved</option>";
                                    } else {

                                        echo "<option value='no yet approved'>no yet approved</option>";
                                        echo "<option value='approved'>Approved</option>";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <textarea name="isiArtikel" readonly id="isiArtikel" rows="10" cols="100" required autocomplete="off">
                                <?= html_entity_decode($brs['isi']); ?>
                            </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="editArtikel" class="btn btn-success">
                            <i class="fas fa-save" style="margin-right: 10px;"></i>Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <a href="index.php" class="btn btn-primary shadow-lg btn-md active ml-3" role="button" style="margin-bottom: 5px;">
        <i class="fas fa-arrow-left" style="margin-right: 10px;"></i>Kembali
    </a>
    <a class="btn btn-warning editArtikel shadow-lg btn-md active ml-3" role="button" style="margin-bottom: 5px;">
        <i class="fas fa-edit" style="margin-right: 10px;"></i>Edit
    </a>
    <div class="row ml-1 mr-1 mb-3">
        <div class="col-sm-3">
            <div class="card card-primary border shadow-lg">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white">Detail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-user mr-1"></i>Author</strong>
                    <p class="text-muted"><?= $brs['author']; ?></p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Location</strong>
                    <p class="text-muted"><?= $brs['lokasi']; ?></p>
                    <hr>
                    <strong><i class="fas fa-calendar-day mr-1"></i>Shared</strong>
                    <p class="text-muted">
                        <span class="tag tag-danger"><?= $brs['date_create']; ?>, <?= $brs['time_create']; ?></span>
                    </p>
                    <hr>
                    <strong><i class="fas fa-calendar-plus mr-1"></i>Last Update</strong>
                    <p class="text-muted">
                        <span class="tag tag-danger"><?= $brs['date_update']; ?>, <?= $brs['time_update']; ?></span>
                    </p>
                    <hr>
                    <strong><i class="far fa-thumbs-up mr-1"><i class="fas fa-comment-alt mr-1"></i></i>Response</strong>
                    <p class="text-muted">
                        <span class="tag tag-danger">45 likes - 2 comments</span>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-3 border shadow-lg">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white"><?= $brs['tempat']; ?></h3>
                </div>
                <div class="card-body p-0">
                    <div class="mailbox-read-message p-3">
                        <img src="foto/<?= $brs['foto']; ?>" style="width: 100%; height:400px;" alt="" class="mb-3">
                        <p><?= html_entity_decode($brs['isi']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endforeach;
?>
<!-- Footer -->
        <footer class="sticky-footer bg-dark">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span class="text-light">Copyright &copy; Kelompok Cempedak <?= date('Y'); ?></span>
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

        <script src="http://localhost/FPWEB/assets/jquery/jquery-3.4.1.min.js"></script>
        <script src="http://localhost/FPWEB/assets/jquery/jquery.min.js"></script>
        <script src="http://localhost/FPWEB/assets/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="http://localhost/FPWEB/assets/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="http://localhost/FPWEB/assets/js/sb-admin-2.min.js"></script>

<script>
    CKEDITOR.replace('isiArtikel');
</script>

<script>
    $(document).ready(function() {
        $('.editArtikel').on('click', function() {
            $('#artikelEditModal').modal('show');

        });
    });
</script>

</body>
</html>