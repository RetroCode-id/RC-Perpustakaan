<?php
session_start();
sleep(1);

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

if (isset($_POST["tambah_koleksi"])) {
  // Cek apakah data berhasil dimasukkan
  if (insertBook($_POST) > 0) {
    echo "
      <script>
        alert('data BERHASIL ditambahkan');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('data GAGAL ditambahkan');
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

  <title>Tambah | Koleksi | Buku</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- myCSS -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>List Books</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="list_pinjam.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>list peminjaman</span>
        </a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Fitur</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Components:</h6>
            <a class="collapse-item bg-info text-white" href="insert_book.php">insert book</a>
            <a class="collapse-item bg-dark text-white mt-2" href="brrow_book.php">brrow book</a>
            <a class="collapse-item bg-danger text-white mt-2" href="log_out.php">log out</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
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
      <div id="content" class="mt-5">

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Koleksi Buku</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">

                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="no_buku">nomor buku</label>
                      <input type="text" class="form-control" id="no_buku" name="no_buku" required>
                    </div>
                    <div class="form-group">
                      <label for="judul_buku">judul buku</label>
                      <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
                    </div>
                    <div class="form-group">
                      <label for="pengarang">pengarang</label>
                      <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                    </div>
                    <div class="form-group">
                      <label for="penerbit">penerbit</label>
                      <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                    </div>
                    <div class="form-group">
                      <label for="tahun_terbit">tahun terbit</label>
                      <input type="date" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                    </div>
                    <div class="form-group">
                      <label for="status">status buku</label>
                      <select class="form-control" id="status" name="status">
                        <option>dipinjam</option>
                        <option>belum dipinjam</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="tambah_koleksi" class="btn btn-outline-primary btn-block">Tambah Koleksi</button>
                    </div>
                  </form>

                </div>

                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <img src="img/bg-book.jpg" class="img-fluid" alt="Responsive image">
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
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ricky Damar Saputra 2019</span>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>