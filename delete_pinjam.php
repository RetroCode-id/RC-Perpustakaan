<?php
require 'functions.php';
$no_pinjam = $_GET["no_pinjam"];

if (deletePinjam($no_pinjam) > 0) {
  echo "<script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'list_pinjam.php';
        </script>";
} else {
  echo "<script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'list_pinjam.php';
        </script>";
}
