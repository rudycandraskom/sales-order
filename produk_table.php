<?php
require("function.php");
$perintahSQL = "SELECT * FROM produk WHERE deleted = 0 ORDER BY nama_item";
$readTable = readTable(koneksiDatabase(), $perintahSQL); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="produk_table.css" rel="stylesheet">
    
    <title>Tabel Produk</title>
</head>

<body>
    <div class="kontener">
        <div class="header">
            <h1 class="atas">Manage Produk</h1>
            <div class="atas">
                <form action="" method="post">
                    <input type="search" class="search" placeholder="Search..." id="cari_produk" name="cari_produk" autofocus>
                    <label for="cari_produk" class="searchlabel material-icons">search</label>
                </form>
            </div>
            <a href="/php/salesorder/produk_create.php" class="atas material-icons">add_circle</a>     
        </div>
        <div id="tabel-hasil">
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>KODE PRODUK</th>
                        <th>NAMA PRODUK</th>
                        <th>KEMASAN</th>
                        <th>ISI</th>
                        <th>SATUAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    <?php for($i = 0; $i<count($readTable); $i++ ){ ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $readTable[$i]["kode_item"]; ?></td>
                            <td><?= $readTable[$i]["nama_item"]; ?></td>
                            <td><?= $readTable[$i]["kemasan"]; ?></td>
                            <td><?= $readTable[$i]["isi"]; ?></td>
                            <td><?= $readTable[$i]["satuan"]; ?></td>
                            <td>
                                <a href="produk_edit.php?kode_item=<?= $readTable[$i]["kode_item"]; ?>" class="material-icons" data-title="Edit">edit</a>
                                <a href="produk_delete.php?kode_item=<?= $readTable[$i]["kode_item"]; ?>" onclick="return confirm('Yakin menghapus item ini?');" class="material-icons" data-title="Delete">delete</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="jquery.js"></script>
    <script src="produk_search.js"></script>
</body>

</html>