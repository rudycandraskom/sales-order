$(document).ready(function() {
    $("#cari_produk").on("keyup", function() {
        console.log("produk_search.php?keyword=" + cari_produk.value);
        $("#tabel-hasil").load("produk_search.php?keyword=" + cari_produk.value);
    })
})