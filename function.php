<?php
function phpAlert($pesan){
    echo '<script type="text/javascript">alert("' . $pesan . '")</script>';
}

function koneksiDatabase(){
    return mysqli_connect("localhost", "root", "", "salesorder");
}

function readTable($koneksiDB, $perintahSQL){
    $result = mysqli_query($koneksiDB, $perintahSQL);
    $rows = []; 
    while($row = mysqli_fetch_assoc($result)){
        $rows[] =  $row;
    }
    return $rows;
}

function tambahDataProduk($koneksiDB, $dataBaru){
    $kode_item = htmlspecialchars($dataBaru["kode_item"]);
    $nama_item = htmlspecialchars($dataBaru["nama_item"]);
    $kemasan = htmlspecialchars($dataBaru["kemasan"]);
    $isi = htmlspecialchars($dataBaru["isi"]);
    $satuan = htmlspecialchars($dataBaru["satuan"]);    
    $perintahSQL = "INSERT INTO produk 
                    VALUES (
                        '', 
                        '$kode_item', 
                        '$nama_item', 
                        '$kemasan', 
                        $isi, 
                        '$satuan', 
                        0, 
                        date('Y-m-d H:i:s'),
                        'user'
                    )";
    mysqli_query($koneksiDB, $perintahSQL);
    return mysqli_affected_rows($koneksiDB);
}

function ubahDataProduk($koneksiDB, $dataBaru, $id){
    $kode_item = htmlspecialchars($dataBaru["kode_item"]);
    $nama_item = htmlspecialchars($dataBaru["nama_item"]);
    $kemasan = htmlspecialchars($dataBaru["kemasan"]);
    $isi = htmlspecialchars($dataBaru["isi"]);
    $satuan = htmlspecialchars($dataBaru["satuan"]);
    $perintahSQL = "UPDATE produk 
                    SET 
                        kode_item = '$kode_item', 
                        nama_item = '$nama_item', 
                        kemasan = '$kemasan', 
                        isi = $isi, 
                        satuan = '$satuan',
                        edited = date('Y-m-d H:i:s'),
                        user = 'user'
                    WHERE 
                        id = '$id'
                    ";
    mysqli_query($koneksiDB, $perintahSQL);
    return mysqli_affected_rows($koneksiDB);
}

function hapus($koneksiDB, $kode_produk){
    mysqli_query($koneksiDB,
        "UPDATE produk 
        SET 
            deleted = 1,
            edited = date('Y-m-d H:i:s')
        WHERE 
            kode_item = '$kode_produk'"
        );
    return mysqli_affected_rows($koneksiDB);
}

function registrasi($koneksiDB, $userbaru){
    $username =strtolower(stripslashes($userbaru["username"]));
    $password = mysqli_real_escape_string($koneksiDB, $userbaru["password"]);
    $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
    $perintahSQL = "INSERT INTO user 
                    VALUES (
                        '', 
                        '$username', 
                        '$passwordEncrypted', 
                        date('Y-m-d H:i:s'),
                        date('Y-m-d H:i:s')
                    )";
    mysqli_query($koneksiDB, $perintahSQL);
    return mysqli_affected_rows($koneksiDB);
}

function checkExistingUsername($username){
    $perintahSQL = "SELECT * FROM user WHERE username = '$username'";
    $hasil = mysqli_query(koneksiDatabase(), $perintahSQL);
    return mysqli_num_rows($hasil) > 0 ? false : true;
}

function confirmPassword($password, $confirmpassword){
    return $password == $confirmpassword ? true : false;
}

?>