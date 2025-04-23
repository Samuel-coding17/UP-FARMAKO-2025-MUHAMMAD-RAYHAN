<?php
 include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi E-Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="card shadow">
    <div class="card-body">
    <h2 class="mb-2 mt-2 text-center">Tambah Kereta</h2>
    <form method="post" class="justify-content-center">
    <?php 
        if(isset($_POST['submit'])){
            $nama_kereta = $_POST['nama_kereta'];
            $kelas = $_POST['kelas'];
            $kapasitas = $_POST['kapasitas'];

            $query = mysqli_query($koneksi, "INSERT INTO kereta(nama_kereta,kelas,kapasitas) values('$nama_kereta','$kelas','$kapasitas')");
            if($query) {
                echo '<script>alert("tambah data berhasil."); location.href="dashboard.php?page=kereta";</script>';
            } else {
                echo '<script>alert("tambah data gagal.");</script>';
            }
        }
    ?>

        <div class="row justify-content-center mb-3">
            <div class="col-md-1">Nama Kereta</div>
            <div class="col-md-8"><input type="text" name="nama_kereta"  class="form-control"></div>  
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-md-1">Kelas</div>
            <div class="col-md-8">
                <select name="kelas" class="form-control">
                    <option value="ekonomi">ekonomi</option>
                    <option value="vip">vip</option>
                    <option value="bisnis">bisnis</option>
                </select>
            </div>  
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-md-1">Kapasitas</div>
            <div class="col-md-8"><input type="number" name="kapasitas" class="form-control"></div>  
        </div>
        <div class="col-md-2">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
            <a href="dashboard.php?page=kereta" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
    </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>   
</body>
</html>