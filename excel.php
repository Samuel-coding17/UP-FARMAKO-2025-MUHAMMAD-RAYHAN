
<h2 align="center">Laporan Pembayaran Ticket</h2>
<table class="table table-bordered table-striped">
        <tr class="table-primary">
            <th>No</th>
            <th>Total Bayar</th>
            <th>Metode Bayar</th>
            <th>Status</th>
            <th>Bukti</th>
        </tr>
        <?php
            include "koneksi.php";

            header("Content-type:aplication/vnd-ms-excel");
            header("Content-Disposition:attachment; filename=DataPayment.xls");


            $i = 1;

            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN pemesanan on pemesanan.id_pemesanan = pembayaran.id_pemesanan ");
            while($data = mysqli_fetch_array($query)) {
        ?>
        <tr>                
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['total_bayar']; ?></td>
                <td><?php echo $data['metode_bayar']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td><?php echo $data['bukti']; ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
        <script>
            window.print();
            setTimeout(function() {
                window.close();
            }, 100);
        </script>