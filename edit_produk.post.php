<?php
include './toko.php';

$id = $_GET['id'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga_produk = $_POST['harga_produk'];

if ($_FILES['foto']['size'] > 0) {
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, 'file/' . $filename);
    $upfile = mysqli_query($conn, "update produk set foto='" . $filename . "' where id = '" . $id . "' ");
}

$sql = "
        update produk set nama_produk = '" . $nama_produk . "', deskripsi = '" . $deskripsi . "', harga_produk = '" . $harga_produk . "'
        where id = '" . $id . "';
    ";

$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: tampil_produk.php');
} else {
    printf('Failed update produk: ' . mysqli_error($conn));
    exit();
}
?>