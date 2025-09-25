<?php
include "config.php";

// Ambil data
$nama = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$tipe = $_POST['tipe'];
$fitur = isset($_POST['fitur']) ? implode(", ", $_POST['fitur']) : "";
$password = $_POST['password'];

// Insert ke database
$sql = "INSERT INTO produk (nama_produk, deskripsi, kategori, harga, stok, tipe, fitur, password) 
        VALUES ('$nama','$deskripsi','$kategori','$harga','$stok','$tipe','$fitur','$password')";

if($koneksi->query($sql)){
    header("Location: list.php?status=sukses");
} else {
    echo "Error: " . $koneksi->error;
}
?>
