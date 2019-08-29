<?php 
require 'functions.php';
$no_buku = $_GET["no_buku"];

if (deleteBook($no_buku) > 0) {
    echo "<script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'index.php';
        </script>";
}
