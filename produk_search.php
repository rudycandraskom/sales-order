<?php
require ("function.php");
$keyword = $_GET["keyword"];
$perintahSQL = "SELECT * FROM 
                    produk 
                WHERE 
                    deleted = 0 
                AND
                    kode_item LIKE '%$keyword%' OR
                    nama_item LIKE '%$keyword%' OR
                    kemasan LIKE '%$keyword%' OR
                    isi LIKE '%$keyword%' OR
                    satuan LIKE '%$keyword%'
                ORDER BY 
                    nama_item";
$readTable = readTable(koneksiDatabase(), $perintahSQL);
?>

<table border="1" cellpadding="10" cellspacing="0">
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
                    <a href="produk_edit.php?kode_item=<?= $readTable[$i]["kode_item"]; ?>">&#9998; <b>Edit<b></a>
                    <a href="produk_delete.php?kode_item=<?= $readTable[$i]["kode_item"]; ?>" onclick="return confirm('Yakin menghapus item ini?');">&#128465; <b> Delete</a>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>
