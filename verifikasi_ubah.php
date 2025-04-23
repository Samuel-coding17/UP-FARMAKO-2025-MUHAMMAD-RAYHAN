<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 class="mt-4">Pesan Tiket</h1>
<div class="container my-5">
    <div class="card shadow">
    <div class="card-body">
    <div class="col-md-12">
       <form method="post">

        <?php

        $id = $_GET['id'];
            if(isset($_POST['submit'])){
                $status_bayar = $_POST['status_bayar'];
               
                $query = mysqli_query($koneksi, "UPDATE pemesanan set status_bayar ='$status_bayar' WHERE id_pemesanan=$id");

                if($query) {
                    echo "<script>alert('Ubah Data Berhasil.'); locaton.href='dashboard.php?page=verifikasi';</script>";
                }else {
                    echo "<script>alert('Ubah Data Gagal.')</script>";
                }
            }

            $query= mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pemesanan=$id");
            $data=mysqli_fetch_array($query);
        ?>

             
           
            <div class="row mb-3">
                <div class="col-md-2">Status Bayar</div>
                <div class="col-md-8">
                    <select name="status_bayar" class="form-control">
                        <option name="">-- status --</option>
                        <option value="sudah bayar" <?php if($data['status_bayar'] == 'berhasil') echo 'selected'; ?>>Sudah bayar</option>
                        <option value="belum bayar" <?php if($data['status_bayar'] == 'gagal') echo 'selected'; ?>>Belum bayar</option>
                        
                    </select>
                </div>
            </div>
            
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <a href="?page=verifikasi" class="btn btn-danger">Kembali</a>
                </div>
           </div>
        </form>
        </div>
    </div>
    </div>
</div>
</body>
</html>