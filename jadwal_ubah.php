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
        $id = $_GET['id'];

        if(isset($_POST['submit'])){
            $id_kereta = $_POST['id_kereta'];
            $asal = $_POST['asal'];
            $tujuan = $_POST['tujuan'];
            $tanggal = $_POST['tanggal'];
            $waktu_berangkat = $_POST['waktu_berangkat'];
            $waktu_tiba = $_POST['waktu_tiba'];
            $harga = $_POST['harga'];

            $query = mysqli_query($koneksi, "UPDATE jadwal SET id_kereta = '$id_kereta', asal = '$asal', tujuan = '$tujuan', tanggal = '$tanggal', waktu_berangkat = '$waktu_berangkat', waktu_tiba = '$waktu_tiba', harga = '$harga' where id_jadwal = $id");
            if($query) {
                echo '<script>alert("update data berhasil."); location.href="dashboard.php?page=jadwal";</script>';
            } else {
                echo '<script>alert("update data gagal.");</script>';
            }
        }
        $query = mysqli_query($koneksi, "SELECT * FROM jadwal");
        $data = mysqli_fetch_array($query);
    ?>
        
        <div class="row mb-3">
            <div class="col-md-1">Nama Kereta</div>
            <div class="col-md-8">
            <select name="id_kereta" class="form-control">
                    <?php
                        $ker = mysqli_query($koneksi, "SELECT*FROM kereta");
                        while($kereta = mysqli_fetch_array($ker)) {
                    ?>
                        <option <?php if($kereta['id_kereta'] == $data['id_kereta']) echo 'selected'; ?> value="<?php echo $kereta['id_kereta']; ?>"><?php echo $kereta['nama_kereta'] ?></option>
                            <?php
                                }
                            ?>
                </select>
            </div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Asal</div>
            <div class="col-md-8"><input type="text" name="asal" value="<?php echo $data['asal']; ?>" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Tujuan</div>
            <div class="col-md-8"><input type="text" name="tujuan" value="<?php echo $data['tujuan']; ?>" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Tanggal</div>
            <div class="col-md-8"><input type="date" name="tanggal" value="<?php echo $data['tanggal']; ?>" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Waktu Berangkat</div>
            <div class="col-md-8"><input type="time" name="waktu_berangkat" value="<?php echo $data['waktu_berangkat']; ?>" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Waktu Tiba</div>
            <div class="col-md-8"><input type="time" name="waktu_tiba" value="<?php echo $data['waktu_tiba']; ?>" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Harga</div>
            <div class="col-md-8"><input type="number" name="harga" value="<?php echo $data['harga']; ?>" class="form-control"></div>  
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