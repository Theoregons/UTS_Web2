<?php 
 
$id = $_GET["id"];
 
$koneksi = mysqli_connect("localhost", "root", "", "soal2");
$sql = "DELETE FROM data_mhs WHERE id = $id";

mysqli_query($koneksi, $sql); 
header("Location: index.php");
 


?> 