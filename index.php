<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi E-Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<style>
    .hero {
        background-image: url('image/kiti.jpg');
        background-size: cover;
        color: white;
        padding: 50px 20px;
    }
    .overlay {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 180px 0px;
    }
    .featur-icon {
        font-size: 3rem;
        color: #0d6efd;
    }

    h2 {
        color: #333;
        text-align: center;
        }

    form {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 1500px;
        margin-bottom: 30px;
    }

    input, button {
        padding: 10px;
        margin: 5px 0;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background: #0056b3;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 15000px;
        background: white;
        margin-bottom: 30px;
    }

    th {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
        background: #333;
        color: white;
    }

    td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .no-result {
        color: red;
        font-weight: bold;
    }
</style>
<body>
    <section class="hero text-center">
        <div class="overlay">
            <h1 class="display-4 fw-bold">Selamat Datang di E-Ticket</h1>
            <p class="lead">pesan tiket mudah aman dan cepat</p>
            <a href="login.php" class="btn btn-primary btn-lg mt-3">Login</a>
        </div>
    </section>

        <section id="fitur" class="py-5 text-center">
            <div class="container">
                <h2 class="mb-5">Kenapa pilih E-Ticket</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-4 border rounded shadow-sm">
                            <div class="feature-icon mb-3"><i class="fas fa-home"></div>
                            <h5>Pemesanan mudah</h5>
                            <p>pilih rute isi data dan tiket langsung dikirim</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end g-4 ">
                    <div class="col-md-4">
                        <div class="p-4 border rounded shadow-sm">
                            <div class="feature-icon mb-3"><i class="fas fa-home"></div>
                            <h5>Pemesanan Cepat</h5>
                            <p>pesan tiket dan isi data akan langsung dikirim</p>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-4 border rounded shadow-sm">
                            <div class="feature-icon mb-3"><i class="fas fa-home"></div>
                            <h5>Tidak perlu ribet</h5>
                            <p>tinggal pesan dan tiket langsung dikirim</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h2>Cari jadwal tiket</h2>
<form action="index.php" method="post">
    <input type="text" name="asal" placeholder="Kota Asal" required>
    <input type="text" name="tujuan" placeholder="Kota Tujuan" required>
    <input type="date" name="tanggal" placeholder="Tanggal Berangkat" required>
    <button type="submit">Cari</button>
</form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $asal      = $_POST['asal'];
        $tujuan    = $_POST['tujuan'];
        $tanggal   = $_POST['tanggal'];

        $conn = new mysqli("localhost","root","","tiker");

        if($conn->connect_error) {
            die("koneksi gagal: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM jadwal WHERE
                asal LIKE '%$asal%' AND
                tujuan LIKE '%$tujuan%' AND
                tanggal LIKE '$tanggal'";

        $result = $conn->query($sql);

        echo "<h3>Hasil pencarian:</h3>";
        if($result->num_rows > 0){
        echo "<table>
                <tr>
                    <th>Kota Asal</th>
                    <th>Kota Tujuan</th>
                    <th>Tanggal Berangkat</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "  <tr>
                        <td>{$row['asal']}</td>
                        <td>{$row['tujuan']}</td>
                        <td>{$row['tanggal']}</td>
                    </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='no-result'>TIdak ada jadwal ditemukan</p>";
    }

    $conn->close();

}
?>

        <footer class="bg-dark text-white text-center py-2">
            <p class="mb-0">&copy; E-Ticket 2025</p>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>   
</body>
</html>