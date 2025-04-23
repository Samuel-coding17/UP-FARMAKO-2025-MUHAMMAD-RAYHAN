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
    <h2 class="mt-2 mb-2 text-center">Data Kereta</h2>
    <a href="kereta_tambah.php" class="mb-1 btn btn-success form-control">+ Tambah Kereta</a>
    <table class="table table-bordered table-striped">
        <tr class="table-primary">
            <th>No</th>
            <th>Nama Kereta</th>
            <th>Kelas</th>
            <th>Kapasitas</th>
            <th>Action</th>
        </tr>
        <?php
            $i = 1;

            $query = mysqli_query($koneksi, "SELECT * FROM kereta");
            while($data = mysqli_fetch_array($query)) {
        ?>
        <tr>                
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['nama_kereta']; ?></td>
                <td><?php echo $data['kelas']; ?></td>
                <td><?php echo $data['kapasitas']; ?></td>
                <td>
                    <a href="kereta_ubah.php?ubah_kereta&id=<?= $data['id_kereta']; ?>" class="btn btn-warning" >Update</a>
                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini')" href="kereta_hapus.php?hapus_kereta&id=<?= $data['id_kereta']; ?>" class="btn btn-danger" >Delete</a>
                </td>
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