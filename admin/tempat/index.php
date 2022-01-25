<?php
$title = "Wisata Kaltara | Tempat Wisata";
session_start();
require '../function.php';
if (!isset($_SESSION["login"])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_POST["artikelEditModal"])) {
    var_dump("Tombol edit ditekan");
    die;
}
$jumdatph = 10;
$jumalldat = count(data("SELECT * FROM artikel"));
$jumhal = ceil($jumalldat / $jumdatph);
$aktpage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$dtawl = ($jumdatph * $aktpage) - $jumdatph;

$artikel = data("SELECT * FROM artikel ORDER BY date_update DESC LIMIT $dtawl, $jumdatph");
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
                <?php
                if ($title == "Wisata Kaltara | Home Admin") {
                    include 'cardinfo.php';
                    # code...
                }
                ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
</body>
<?php
if (isset($_POST["saveArtikel"])) {

    if (addArtikel($_POST) > 0) {
        echo "
      <script>
        alert('Data berhasil disimpan');
        document.location.href = 'index.php';
      </script>
      ";
    } else {
        echo "
      <script>
        alert('Data gagal disimpan. Cek Primary key tidak boleh sama atau unik');
        document.location.href = 'index.php';
      </script>
      ";
    }
}
?>

<div class="modal fade" id="artikelAddModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Tempat Wisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="nama" id="nama" class="form-control" autofocus="true" autocomplete="off" placeholder="Nama Tempat Wisata" required>
                        </div>
                        <div class="form-group">
                            <input placeholder="Lokasi Tempat Wisata ( Desa/Kecamatan/Kabupaten )" type="text" name="lokasi" id="lokasi" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label><br>
                            <input type="file" name="foto" id="foto" required=""></div>
                        <div class="form-group">
                            <textarea name="isiArtikel" id="isiArtikel" rows="10" cols="100" required autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="saveArtikel" class="btn btn-success">
                        <i class="fas fa-save" style="margin-right: 10px;"></i>Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class=" container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Lokasi Wisata</h6>
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#artikelAddModal" data-whatever="@mdo">
                <i class="fas fa-plus"></i> Tambah
            </button>
            <a class="btn" href="" style="border-color: black; margin-bottom: 1px;">
                <i class="fas fa-fw fa-retweet"></i> Refresh
            </a>

            </button>
            <div class="float-right">

            </div>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Foto</th>
                            <th>Author</th>
                            <th>Nama Tempat</th>
                            <th>Lokasi</th>
                            <th>Date Create</th>
                            <th>Time Create</th>
                            <th>Date Update</th>
                            <th>Time Update</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($artikel as $brs) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><img src="foto/<?= $brs['foto']; ?>" alt="" style="width: 100px;"></td>
                                <td><?= $brs["author"]; ?></td>
                                <td><?= $brs["tempat"]; ?></td>
                                <td><?= $brs["lokasi"]; ?></td>
                                <td><?= $brs["date_create"]; ?></td>
                                <td><?= $brs["time_create"]; ?></td>
                                <td><?= $brs["date_update"]; ?></td>
                                <td><?= $brs["time_update"]; ?></td>
                                <td><?= $brs["sts"]; ?></td>
                                <td>
                                    <a type="button" title="Detail" class='btn m-1 btn-success' href="detail.php?id=<?= $brs["id"]; ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a type="button" title="Hapus" class='btn m-1 btn-danger' href="delete.php?id=<?= $brs["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="text-center">
                    <span class="btn btn-primary">Halaman</span>
                    <div class="btn-group">
                        <?php if ($aktpage > 1) : ?>
                            <a href="?page=<?= $aktpage - 1; ?>" class="btn" style="border-color: black;"><i class="fas fa-angle-left"></i></a>
                        <?php endif; ?>
                        <?php for ($a = 1; $a <= $jumhal; $a++) : ?>
                            <?php if ($a == $aktpage) : ?>
                                <a href="?page=<?= $a; ?>" class="btn btn-success" style="font-weight: bold; border-color: black;"><?= $a; ?>
                                </a>
                            <?php else : ?>
                                <a href="?page=<?= $a; ?>" class="btn" style="border-color: black;"><?= $a; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($aktpage < $jumhal) : ?>
                            <a href="?page=<?= $aktpage + 1; ?>" class="btn" style="border-color: black;"><i class="fas fa-angle-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
        <footer class="sticky-footer bg-dark">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span class="text-light">Copyright &copy; kelompok cempedak <?= date('Y'); ?></span>
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
    // Replace the <textarea id="isiBerita"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('isiArtikel');
</script>

</body>
</html>