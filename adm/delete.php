<?php
require_once("header.php");

$id = $_GET['id'];
$query = "DELETE FROM uploads WHERE id = $id"; // query hapus data

if(mysqli_query($conn, $query)){
    header("Location: download.php"); // redirect ke index.php
}else{
    echo "Hapus data gagal";
}
?>