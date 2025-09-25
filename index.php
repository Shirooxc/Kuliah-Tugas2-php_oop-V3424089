<?php
include "header.php";
include "class_form.php";

$form = new Form("proses.php","Simpan Produk");
$form->addField("nama_produk","Nama Produk","text");
$form->addField("deskripsi","Deskripsi","textarea");
$form->addField("kategori","Kategori","select", [
    "makanan" => "Makanan",
    "minuman" => "Minuman",
    "jasa" => "Jasa",
    "lainnya" => "Lainnya"
]);
$form->addField("harga","Harga","text");
$form->addField("stok","Stok Tersedia","text");
$form->addField("tipe","Tipe Produk","radio", [
    "baru" => "Baru",
    "bekas" => "Bekas"
]);
$form->addField("fitur","Fitur Tambahan","checkbox", [
    "garansi" => "Garansi",
    "diskon" => "Diskon",
    "premium" => "Premium"
]);
$form->addField("password","Password Akses","password");

echo "<h2 class='text-center fw-bold mb-4' data-aos='fade-down'>Input Produk / Jasa</h2>";
$form->displayForm();

include "footer.php";
?>
