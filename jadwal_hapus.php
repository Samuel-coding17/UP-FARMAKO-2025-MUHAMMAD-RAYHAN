<?php

include "koneksi.php";

 $id = $_GET['id'];
 $query = mysqli_query($koneksi, "DELETE FROM jadwal where id_jadwal = $id")
?>

<script>
    alert('Data Terhapus');
    location.href = 'dashboard.php?page=jadwal';
</script>