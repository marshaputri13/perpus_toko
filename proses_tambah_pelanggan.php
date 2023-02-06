<?php
if ($_POST) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    if (empty($nama_pelanggan)) {
        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif (empty($telpon)) {
        echo "<script>alert('nomor telpon tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else {
        include "toko.php";
        $insert = mysqli_query($conn, "insert into pelanggan (nama_pelanggan, alamat, telpon) value ('" . $nama_pelanggan . "','" . $alamat . "','" . $telpon . "')");
        if ($insert) {
            echo "<script>alert('Sukses menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
        }
    }
}
?>