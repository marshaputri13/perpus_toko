<?php

include './toko.php';

$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga_produk = $_POST['harga_produk'];

if ($_FILES['foto']['size'] > 0) {
    $foto = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, 'file/' . $foto);
    $sql = "
        insert into produk (nama_produk, deskripsi, harga_produk, foto)
        values ('" . $nama_produk . "', '" . $deskripsi . "', '" . $harga_produk . "', '" . $foto . "');
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: tampil_produk.php');
    } else {
        printf('Failed create product: ' . mysqli_error($conn));
        exit();
    }
}