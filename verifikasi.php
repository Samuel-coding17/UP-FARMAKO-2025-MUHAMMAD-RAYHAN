<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi E-Ticket</title>
</head>
<body>

<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
    <h1 class="mt-2 mb-2 text-center">Data Pemesanan Tiket</h1>
    <table class="table table-bordered table-striped">
                <thead>
                    <tr class="table-primary">
                        <th>No</th>
                        <th>Nama Penumpang</th>
                        <th>Nama Kereta</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Jumlah Tiket</th>
                        <th>Total Bayar</th>
                        <th>Status Pembayaran</th>
                        <!-- <th>Waktu Pemesanan</th> -->
                        <th>Aksi</th>
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
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['nama_kereta']; ?></td>
                            <td><?= $data['asal']; ?></td>
                            <td><?= $data['tujuan']; ?></td>
                            <td><?= $data['jumlah_tiket']; ?></td>
                            <td>Rp<?= number_format($data['total_bayar'], 0, ',', '.'); ?></td>
                            <td><?= ucfirst($data['status_bayar']); ?></td>
                            <!-- <td><?= $data['waktu_pemesanan']; ?></td> -->
                            <td>
                            <?php
                                if($data['status_bayar'] != 'berhasil') {
                            ?>
                                <a href="?page=verifikasi_ubah&&id=<?php echo $data['id_pemesanan']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=verifikasi_hapus&&id=<?php echo $data['id_pemesanan']; ?>" class="btn btn-danger">Hapus</a>
                            <?php
                                }
                            ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>




            
  
