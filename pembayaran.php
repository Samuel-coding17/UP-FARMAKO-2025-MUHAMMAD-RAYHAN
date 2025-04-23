
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
    <h2 class="mb-10 mt-2 text-center">Pembayaran</h2>
    <form method="post">
    <?php 
        if(isset($_POST['submit'])){
            $id_pemesanan = $_POST['id_pemesanan'];
            $metode_bayar = $_POST['metode_bayar'];
            $bukti = $_POST['bukti'];

            $query = mysqli_query($koneksi, "INSERT INTO pembayaran(id_pemesanan,metode_bayar,bukti) values('$id_pemesanan','$metode_bayar','$bukti')");
            if($query) {
                echo '<script>alert("tambah data berhasil."); location.href="dashboard.php?page=dashboard.php?page=pembayaran";</script>';
            } else {
                echo '<script>alert("tambah data gagal.");</script>';
            }
        }
    ?>
        
        <div class="row mb-3">
            <div class="col-md-1">Total Bayar</div>
            <div class="col-md-8">
            <select name="id_pemesanan" class="form-control">
                    <?php
                        $pes = mysqli_query($koneksi, "SELECT*FROM pemesanan");
                        while($pemesanan = mysqli_fetch_array($pes)) {
                    ?>
                        <option value="">-- pilih total --</option>
                        <option value="<?php echo $pemesanan['id_pemesanan']; ?>"><?php echo $pemesanan['total_bayar'] ?></option>
                            <?php
                                }
                            ?>
                </select>
            </div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">Metode Bayar</div>
            <div class="col-md-8"><input type="text" name="metode_bayar" class="form-control"></div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-1">bukti</div>
            <div class="col-md-8"><input type="file" name="bukti" class="form-control"></div>  
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