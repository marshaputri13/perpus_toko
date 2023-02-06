<!DOCTYPE html>
<?php include './toko.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <style>
        body{
            font-family: calibri;
        }

        .create{
            width: 90px;
            height: 30px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            outline: none;
            align-items: center;
            background: #935CF5;
            border-color: transparent;;
            color: #ffff;
            box-shadow: 3px 3px 10px #6c757d;
            font-family: calibri;
            margin-left: 20px;
        }

        .edit{
            width: 80px;
            height: 30px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            outline: none;
            align-items: center;
            background: #7D3DCF;
            border-color: transparent;
            color: #ffff;
            margin-left: 0px;
            box-shadow: 3px 3px 10px #6c757d;
            font-family: calibri;
        }

        .delete{
            width: 80px;
            height: 30px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            outline: none;
            align-items: center;
            background: #C7B3E3;
            border-color: transparent;
            color: #ffff;
            margin-left: 5px;
            margin-right: 20px;
            box-shadow: 3px 3px 10px #6c757d;
            font-family: calibri;
        }

        a{
            text-decoration: none;
            color: #fff;
        }
        a:hover{
            color: #fff;
        }

        button:active{
            transform: scale(1.1);
        }

        .student{
            font-weight: bold;
            margin-left: 20px;
            margin-top: 20px;
        }

        .make{
            width: 90px;
            height: 30px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            outline: none;
            align-items: center;
            background: #935CF5;
            border-color: transparent;
            color: #ffff;
            box-shadow: 3px 3px 10px #6c757d;
            font-family: calibri;
        }

        table{
            margin-top: 10px;
        }

        .field{
            background: #935CF5; 
        }

        input:active{
            border-color: #935CF5;
        }

        tr #header{
            background-color: #935CF5;
        }

        
    </style>
</head>
<body>
    <h5 class="student">Tambah Produk</h5>
    <button class="create" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
    <br>

    <?php
        $sql = 'select * from produk';
        $result = mysqli_query($conn, $sql);
    ?>
    <div class="card-body px-20 pt-20 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0 table-striped">
            <thead>
                <tr class="text-xs font-weight-bold opacity-6 text-secondary bg-light" >
                    <th>ID</th>
                    <th class="align-middle text-left">Nama Produk</th>
                    <th class="align-middle text-left">Deskripsi</th>
                    <th class="align-middle text-left">Harga</th>
                    <th class="align-middle text-left">Foto</th>
                    <th class="align-middle text-left">Action</th>
                </tr>
            </thead>

            <?php
        include "toko.php";
        $qry_produk = mysqli_query($conn, "select * from produk");
                $no = 0;
                while($data_produk=mysqli_fetch_array($qry_produk)){
                    $no++;?>
                    <tr>
                        <td><?=$no?></td><td><?=$data_produk['nama_produk']?></td>
                        <td><?=$data_produk['deskripsi']?></td>
                        <td><?=$data_produk['harga_produk']?></td>
                        <td><?="<img src='img/".$data_produk['foto']."'style='width:150px; height: 100px;'>"?></td>
                        <td><a href="edit-produk.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-success">Edit</a> | <a href="delete_produk.php?id_produk=<?=$data_produk['id_produk']?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>

    <!--Modal Create-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button ype="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="tambah_produk.post.php" method="post" enctype="multipart/form-data">
                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga</label>
                                <input type="text" name="harga_produk" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            <br>
                            <button type="submit" class="make" onclick="alert('Are you sure to add the product?')">Add</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
 
</body>
</html>