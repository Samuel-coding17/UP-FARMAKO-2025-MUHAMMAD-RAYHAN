<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
<h1 class="mt-4">Pemesanan Tiket</h1>
<div class="container my-5">
    <div class="card shadow">
    <div class="card-body">
    <div class="col-md-12">
       <form method="post">

        <?php

                include "koneksi.php";
            if(isset($_POST['submit'])){
                $id_jadwal = $_POST['id_jadwal'];
                $id_user = $_SESSION['user']['id_user'];
                $jumlah_tiket = $_POST['jumlah_tiket'];
                $total_bayar = $_POST['total_bayar'];
                $status_bayar = $_POST['status_bayar'];
               
                $query = mysqli_query($koneksi, "INSERT INTO pemesanan(id_user,id_jadwal,jumlah_tiket,total_bayar,status_bayar) VALUES ('$id_user','$id_jadwal','$jumlah_tiket','$total_bayar','$status_bayar')");

                if($query) {
                    echo "<script>alert('Tambah Data Berhasil.'); location.href='dashboard.php?page=pemesanan';</script>";
                }else {
                    echo "<script>alert('Tambah Data Gagal.')</script>";
                }
            }
        ?>
            <div class="row mb-3">
                <div class="col-md-2">Jadwal</div>
                <div class="col-md-8">
                    <select name="id_jadwal" class="mb-2 form-control">
                        <?php
                            $jad = mysqli_query($koneksi, "SELECT * FROM jadwal");
                            while($jadwal = mysqli_fetch_array($jad)){
                                ?>
                                <option value="">-- pilih tanggal --</option>
                                <option value="<?php echo $jadwal['id_jadwal']; ?>"><?php echo $jadwal['asal']; ?>  <?php echo $jadwal['tujuan']; ?>  <?php echo $jadwal['tanggal']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Jumlah Tiket</div>
                <div class="col-md-8">
                   <input type="number" class="form-control" name="jumlah_tiket">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Total Bayar</div>
                <div class="col-md-8">
                   <input type="number" class="form-control" name="total_bayar">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Status Bayar</div>
                <div class="col-md-8">
                    <select name="status_bayar" class="form-control">
                        <option name="">-- status --</option>
                        <!-- <option name="sudah bayar">Sudah bayar</option> -->
                        <option name="belum bayar">belum bayar</option>
                       
                    </select>
                </div>
            </div>           
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <a href="dashboard.php?page=pemesanan" class="btn btn-danger">Kembali</a>
                </div>
           </div>
        </form>
        </div>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>    
</body>
</html>