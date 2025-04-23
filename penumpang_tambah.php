<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
<h1 class="mt-4">Penambahan data penumpang</h1>
<div class="container my-5">
    <div class="card shadow">
    <div class="card-body">
       <form method="post">

        <?php

                include "koneksi.php";
            if(isset($_POST['submit'])){
                $id_pemesanan = $_POST['id_pemesanan'];
                $nama_penumpang = $_POST['nama_penumpang'];
                $no_kursi = $_POST['no_kursi'];
               
                $query = mysqli_query($koneksi, "INSERT INTO penumpang(id_pemesanan,nama_penumpang,no_kursi) VALUES ('$id_pemesanan','$nama_penumpang','$no_kursi')");

                if($query) {
                    echo "<script>alert('Tambah Data Berhasil.'); location.href='dashboard.php?page=penumpang';</script>";
                }else {
                    echo "<script>alert('Tambah Data Gagal.')</script>";
                }
            }
        ?>
            <div class="row mb-3">
                <div class="col-md-2">Pesanan</div>
                <div class="col-md-8">
                    <select name="id_pemesanan" class="mb-2 form-control">
                        <?php
                            $pem = mysqli_query($koneksi, "SELECT * FROM pemesanan");
                            while($pemesanan = mysqli_fetch_array($pem)){
                                ?>
                                <option value="">-- pilih tanggal --</option>
                                <option value="<?php echo $pemesanan['id_pemesanan']; ?>"><?php echo $pemesanan['total_bayar']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Nama Penumpang</div>
                <div class="col-md-8">
                   <input type="text" class="form-control" name="nama_penumpang">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">No kursi</div>
                <div class="col-md-8">
                   <input type="text" class="form-control" name="no_kursi">
                </div>
            </div>          
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <a href="?page=jadwaluser" class="btn btn-danger">Kembali</a>
                </div>
           </div>
        </form>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>    
</body>
</html>