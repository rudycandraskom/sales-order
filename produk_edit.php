<?php
require ("function.php");
$kode_produk = $_GET["kode_item"];
$perintahSQL = "SELECT * FROM produk WHERE kode_item = '$kode_produk'";
$data_produk = readTable(koneksiDatabase(), $perintahSQL);
if(isset($_POST["submit"])){
    $hasil = ubahDataProduk(koneksiDatabase(), $_POST, $data_produk[0]['id'] );
    if($hasil > 0){
        phpAlert("Data berhasil diubah..");
        echo "<script>
            document.location.href = 'produk_table.php';
            </script>";
    }else{
        phpAlert("Data gagal diubah..");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produk_create.css">
    <title>Edit Produk</title>
</head>

<body>
    <div class="kontener">
        <h1>Edit Produk</h1>
        <form action="" method="post">
            <label for="kode_item">KODE ITEM</label>
            <input type="text" name="kode_item" id="kode_item" autofocus required value="<?= $data_produk[0]["kode_item"]; ?>">

            <label for="nama_item">NAMA ITEM</label>
            <input type="text" name="nama_item" id="nama_item" required value="<?= $data_produk[0]["nama_item"]; ?>">

            <label for="kemasan">KEMASAN</label>
            <input type="text" name="kemasan" id="kemasan" required value="<?= $data_produk[0]["kemasan"]; ?>">

            <label for="isi">ISI</label>
            <input type="number" name="isi" id="isi" required value="<?= $data_produk[0]["isi"]; ?>">

            <label for="satuan">SATUAN</label>
            <input type="text" name="satuan" id="satuan" required value="<?= $data_produk[0]["satuan"]; ?>">

            <div class="footer">
                <button type="submit" name="submit" class="bawah">SIMPAN</button>
                <button type="button" name="cancel" class="bawah" onclick="window.location='produk_table.php'">CANCEL</button>
            </div>
            
        </form>
    </div>

</body>

</html>