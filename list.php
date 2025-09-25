<?php
include "header.php";
include "config.php";

$result = $koneksi->query("SELECT * FROM produk ORDER BY id DESC");

echo "<h2 class='mb-4 fw-bold'>Daftar Produk / Jasa</h2>";

if(isset($_GET['status']) && $_GET['status']=="sukses"){
    echo "<div class='alert alert-success'>Data berhasil disimpan!</div>";
}

echo "<div class='table-responsive'>";
echo "<table class='table table-striped table-hover align-middle'>";
echo "<thead class='table-dark'>
        <tr>
          <th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th>
          <th>Tipe</th><th>Fitur</th><th>Deskripsi</th>
        </tr>
      </thead><tbody>";

while($row = $result->fetch_assoc()){
    echo "<tr>
            <td>".$row['nama_produk']."</td>
            <td>".$row['kategori']."</td>
            <td>".$row['harga']."</td>
            <td>".$row['stok']."</td>
            <td>".$row['tipe']."</td>
            <td>".$row['fitur']."</td>
            <td>".$row['deskripsi']."</td>
          </tr>";
}

echo "</tbody></table></div>";

include "footer.php";
?>
