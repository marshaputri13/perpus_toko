<?php
    include './toko.php' ;

    $id_produk = $_GET['id_produk'];

    $sql = "
        delete from produk
        where id_produk = '" . $id_produk. "';
    ";

    $result = mysqli_query($conn, $sql);
    if($result) {
        header('Location: tampil_produk.php');
    }else{
        printf('Failed delete product: ' . mysqli_error($conn));
        exit();
    }
?>