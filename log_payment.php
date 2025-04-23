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
    <a href="excel.php" target="_blank" class="btn btn-primary form-control"><i class="fa fa-print"></i> Cetak Data</a><br><br>
    <h2 class="mt-2 mb-2 text-center">Data Pembayaran</h2>
    
    <table class="table table-bordered table-striped">
        <tr class="table-primary">
            <th>No</th>
            <th>Total Bayar</th>
            <th>Metode Bayar</th>
            <th>Bukti</th>
        </tr>
        <?php
            $i = 1;

            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN pemesanan on pemesanan.id_pemesanan = pembayaran.id_pemesanan ");
            while($data = mysqli_fetch_array($query)) {
        ?>
        <tr>                
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['total_bayar']; ?></td>
                <td><?php echo $data['metode_bayar']; ?></td>
                <td><?php echo $data['bukti']; ?></td>
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