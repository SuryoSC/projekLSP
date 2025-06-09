<?php
include "config.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM siswa WHERE id=$id");
header("Location: index.php");
?>
