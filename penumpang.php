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

            
    <h2 class="mt-2 mb-2 text-center">Data Penumpang</h2>
    <a href="penumpang_tambah.php" class="mb-1 btn btn-success form-control">+ Tambah Penumpang</a>
    <table class="table table-bordered table-striped">
        <tr class="table-primary">
            <th>No</th>
            <th>Asal Kota</th>
            <th>Tujuan Kota</th>
            <th>Tanggal Berangkat</th>
            <th>Nama Penumpang</th>
            <th>no_kursi</th>
        </tr>
        <?php

            $i = 1;

            $query = mysqli_query($koneksi, "SELECT * FROM penumpang LEFT JOIN pemesanan ON pemesanan.id_pemesanan = penumpang.id_penumpang");
            while($data = mysqli_fetch_array($query)) {
        ?>
        <tr>                
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['asal']; ?></td>
                <td><?php echo $data['tujuan']; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
                <td><?php echo $data['nama_penumpang']; ?></td>
                <td><?php echo $data['no_kursi']; ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>   
</body>
</html>