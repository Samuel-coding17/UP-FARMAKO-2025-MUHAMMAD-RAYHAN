<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM pemesanan where id_pemesanan='$id'"); 
?>
<script>
    alert('Hapus Data Berhasil.');
    location.href = "index.php?page=verifikasi";

</script>