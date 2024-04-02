<?php
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menerima data
    $namaRoti = $_POST['nama_roti'];
    $diameter = $_POST['diameter_roti'];
    $warna = $_POST['warna_roti'];
    $harga = $_POST['harga_roti'];
    $foto = ($_FILES['foto_roti']['name']);

    // Mengecek apakah index 'foto_roti' ada pada $_FILES
    if (isset($_FILES['foto_roti'])) {
        $target = "C:/xampp/htdocs/praktikum05/"; //tempat direkotiri penyimpanan foto
        $target = $target . basename($_FILES['foto_roti']['name']);

        if (move_uploaded_file($_FILES['foto_roti']['tmp_name'], $target)) { //memindahkan file gambar ke direktori
            echo "File " . basename($_FILES['foto_roti']['name']) . " sudah diupload";
        } else {
            echo "Maaf, ada kesalahan pada file.";
            exit();
        }
    }

    // SQL query menambahkan data
    $sql = "INSERT INTO daftar_roti (nama_roti, diameter, warna, harga, foto) 
            VALUES ('$namaRoti', '$diameter', '$warna', '$harga','$foto')";

    // Mengecek apakah $conn sudah ada sebelum digunakan unutuk mengeksekusi sql
    if (isset($conn)) {
        if ($conn->query($sql) === TRUE) { //eksekusi sql
            header('Location: daftar_roti.php'); //menuju halaman web daftar roti
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error; //jika eror akan menampilkan pesan
        }
    } else {
        echo "Error: Koneksi database tidak dibuat.";
    }
}
$conn->close(); //mengakhiri koneksi database
