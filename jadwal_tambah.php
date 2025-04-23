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
    <h2 class="mb-2 mt-2 text-center">Tambah Jadwal</h2>
    <form method="post">
    <?php 
        if(isset($_POST['submit'])){
            $id_kereta = $_POST['id_kereta'];
            $asal = $_POST['asal'];
            $tujuan = $_POST['tujuan'];
            $tanggal = $_POST['tanggal'];
            $waktu_berangkat = $_POST['waktu_berangkat'];
            $waktu_tiba = $_POST['waktu_tiba'];
            $harga = $_POST['harga'];

            $query = mysqli_query($koneksi, "INSERT INTO jadwal(id_kereta,asal,tujuan,tanggal,waktu_berangkat,waktu_tiba,harga) values('$id_kereta','$asal','$tujuan','$tanggal','$waktu_berangkat','$waktu_tiba','$harga')");
            if($query) {
                echo '<script>alert("tambah data berhasil."); location.href="dashboard.php?page=jadwal";</script>';
            } else {
                echo '<script>alert("tambah data gagal.");</script>';
            }
        }
    ?>
        
        <div class="row mb-3">
            <div class="col-md-1">Nama Kereta</div>
            <div class="col-md-8">
            <select name="id_kereta" class="form-control">
                    <?php
                        $ker = mysqli_query($koneksi, "SELECT*FROM kereta");
                        while($kereta = mysqli_fetch_array($ker)) {
                    ?>
                        <option value="<?php echo $kereta['id_kereta']; ?>"><?php echo $kereta['nama_kereta'] ?></option>
                            <?php
                                }
                            ?>
                </select>
            </div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Asal</div>
            <div class="col-md-8"><input type="text" name="asal" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Tujuan</div>
            <div class="col-md-8"><input type="text" name="tujuan" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Tanggal</div>
            <div class="col-md-8"><input type="date" name="tanggal" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Waktu Berangkat</div>
            <div class="col-md-8"><input type="time" name="waktu_berangkat" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Waktu Tiba</div>
            <div class="col-md-8"><input type="time" name="waktu_tiba" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Harga</div>
            <div class="col-md-8"><input type="number" name="harga" class="form-control"></div>  
        </div>
        <div class="col-md-2">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
            <a href="dashboard.php?page=jadwal" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
    </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>   
    </body>
</html>