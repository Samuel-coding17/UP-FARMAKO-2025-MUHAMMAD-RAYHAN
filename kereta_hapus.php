<?php
include "koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM kereta where id_kereta = $id");

?>

<script>
    alert('Data Berhasil Dihapus');
    location.href = 'dashboard.php?page=kereta';
</script>