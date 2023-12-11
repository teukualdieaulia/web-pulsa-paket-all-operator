<?php
include("../config/koneksi.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $Nama_kartu = $_POST['Nama_kartu'];
    $Nama_produk = $_POST['Nama_produk'];
    $Kuota_utama = $_POST['Kuota_utama'];
    $Kuota_aplikasi = $_POST['Kuota_aplikasi'];
    $Kuota_local = $_POST['Kuota_local'];
    $Harga = $_POST['Harga'];
    $Masa_aktif = $_POST['Masa_aktif'];
    $Keterangan = $_POST['Keterangan'];

    $sql = "UPDATE products_paket_smartfren SET Nama_kartu=?, Nama_produk=?, Kuota_utama=?, Kuota_aplikasi=?, Kuota_local=?, Harga=?, Masa_aktif=?, Keterangan=? WHERE id=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssssssi", $Nama_kartu, $Nama_produk, $Kuota_utama, $Kuota_aplikasi, $Kuota_local, $Harga, $Masa_aktif, $Keterangan, $id);
    $query = $stmt->execute();

    if ($query) {
        echo "<script>alert('Data produk smartfren berhasil diupdate');</script>";
        echo "<script>setTimeout(function(){ window.location.href = 'products-smartfren.php'; }, 1000);</script>";
        exit();
    } else {
        echo "<script>alert('Data gagal diupdate');</script>";
        echo "<script>window.location.replace('products-smartfren.php');</script>";
        exit();
    }
} else {
    echo "<script>window.location.replace('products-smartfren.php');</script>";
    exit();
}
?>
