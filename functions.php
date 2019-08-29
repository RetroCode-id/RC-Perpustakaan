<?php

$conn = mysqli_connect('localhost', 'root', '', 'db_perpustakaan');

function index($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function insertBook($data)
{
    global $conn;

    $no_buku = $data["no_buku"];
    $judul_buku = $data["judul_buku"];
    $pengarang = $data["pengarang"];
    $penerbit = $data["penerbit"];
    $tahun_terbit = $data["tahun_terbit"];
    $status = $data["status"];

    $query = "INSERT INTO tb_buku VALUES(
        '$no_buku','$judul_buku','$pengarang','$penerbit','$tahun_terbit','$status'
    )";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function insertPinjam($data)
{
    global $conn;

    $nis = $data["nis"];
    $no_buku = $data["no_buku"];
    $tanggal_pinjam = $data["tanggal_pinjam"];
    $tanggal_wajib_kembali = $data["tanggal_wajib_kembali"];
    $tanggal_telah_kembali = $data["tanggal_telah_kembali"];

    $query = "INSERT INTO tb_peminjam VALUES(
        '', '$nis', '$no_buku', '$tanggal_pinjam', '$tanggal_wajib_kembali', '$tanggal_telah_kembali'
    )";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateBook($data)
{
    global $conn;

    $no_buku = $data["no_buku"];
    $judul_buku = $data["judul_buku"];
    $pengarang = $data["pengarang"];
    $penerbit = $data["penerbit"];
    $tahun_terbit = $data["tahun_terbit"];
    $status = $data["status"];

    $query =  "UPDATE tb_buku SET 
				no_buku = '$no_buku',
				judul_buku = '$judul_buku',
				pengarang = '$pengarang',
                penerbit = '$penerbit',
				tahun_terbit = '$tahun_terbit',
                status = '$status'
				WHERE no_buku = $no_buku
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteBook($no_buku)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_buku WHERE no_buku = $no_buku");
    return mysqli_affected_rows($conn);
}

function deletePinjam($no_pinjam)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_peminjam WHERE no_pinjam = $no_pinjam");
    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tb_login WHERE username = '$username' ");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('USERNAME yang anda masukan sudah ada!');
			</script>";
        return false;
    }

    // cek konfirmasi pass
    if ($password !== $password2) {
        echo "<script>
				alert('konfirmasi PASSWORD tidak sesuai');
			</script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru
    mysqli_query($conn, "INSERT INTO tb_login VALUES('', '$username', '$password', '')");

    return mysqli_affected_rows($conn);
}
