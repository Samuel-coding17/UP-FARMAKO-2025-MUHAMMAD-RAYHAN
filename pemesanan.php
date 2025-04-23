
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
    <div class="card sahdow">
        <div class="card-body">
        <h1 class="mt-2 mb-2 text-center">Data Pemesanan Tiket</h1>
        <a href="pemesanan_tambah.php" class="mt-2 mb-2 btn btn-success form-control">+ Tambah Pemesanan</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="table-primary">
                        <th>No</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Jumlah Tiket</th>
                        <th>Total Bayar</th>
                        <th>Status Pembayaran</th>
                        <th>Waktu Pemesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "
                        SELECT pemesanan.*, user.nama, kereta.nama_kereta, jadwal.asal, jadwal.tujuan
                        FROM pemesanan 
                        LEFT JOIN user ON pemesanan.id_user = user.id_user
                        LEFT JOIN jadwal ON pemesanan.id_jadwal = jadwal.id_jadwal
                        LEFT JOIN kereta ON jadwal.id_kereta = kereta.id_kereta
                        ORDER BY pemesanan.waktu_pemesanan DESC
                    ");

                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['asal']; ?></td>
                            <td><?= $data['tujuan']; ?></td>
                            <td><?= $data['jumlah_tiket']; ?></td>
                            <td>Rp<?= number_format($data['total_bayar'], 0, ',', '.'); ?></td>
                            <td><?= ucfirst($data['status_bayar']); ?></td>
                            <td><?= $data['waktu_pemesanan']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>   
    </body>
</html>