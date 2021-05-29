<?php
require ("function.php");
if(isset($_POST["submit"])){
    $hasil = tambahDataProduk(koneksiDatabase(), $_POST);
    if($hasil > 0){
        phpAlert("Data berhasil disimpan!!");
        echo "<script>
            document.location.href = 'produk_table.php';
            </script>";
    }else{
        phpAlert("Data Gagal ditambahkan!!");
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
    <title>Tambah Produk</title>
</head>

<body>
    <div class="kontener">
        <h1>Tambah Produk</h1>
        <form action="" method="post">
            <label for="kode_item">KODE ITEM</label>
            <input type="text" name="kode_item" id="kode_item" autofocus required>

            <label for="nama_item">NAMA ITEM</label>
            <input type="text" name="nama_item" id="nama_item" required>

            <label for="kemasan">KEMASAN</label>
            <input type="text" name="kemasan" id="kemasan" required>

            <label for="isi">ISI</label>
            <input type="number" name="isi" id="isi" required>

            <label for="satuan">SATUAN</label>
            <input type="text" name="satuan" id="satuan" required>

            <div class="footer">
                <button type="submit" name="submit" class="bawah">SIMPAN</button>
                <button type="button" name="cancel" class="bawah" onclick="window.location='produk_table.php'">CANCEL</button>
            </div>
            
        </form>
    </div>

</body>

</html>