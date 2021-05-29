<?php
require ("function.php");
$koneksiDB = koneksiDatabase();
$kode_produk = $_GET["kode_item"];
if(hapus($koneksiDB, $kode_produk)>0){
    phpAlert("Data berhasil dihapus...");
    echo "<script>
            document.location.href = 'produk_table.php';
            </script>";
    }else{
        phpAlert("Data gagal dihapus...");
        echo "<script>
            document.location.href = 'produk_table.php';
            </script>";
}
?>