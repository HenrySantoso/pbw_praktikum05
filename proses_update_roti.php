<?php
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menerima data
    $id = $_POST['id_roti'];
    $nama = $_POST['nama_roti'];
    $diameter = $_POST['diameter_roti'];
    $warna = $_POST['warna_roti'];
    $harga = $_POST['harga_roti'];
    $foto = ($_FILES['foto_roti']['name']);

    // Mengecek apakah index 'foto_roti' ada pada $_FILES
    if (isset($_FILES['foto_roti'])) {
        $target = "C:/xampp/htdocs/praktikum05/"; //tempat direkotiri penyimpanan foto
        $target = $target . basename($_FILES['foto_roti']['name']);

        if (move_uploaded_file($_FILES['foto_roti']['tmp_name'], $target)) { //memindahkan file gambar ke direktori
            echo "File " . basename($_FILES['foto_roti']['name']) . " sudah diupload<br>";
        } else {
            echo "Maaf, ada kesalahan pada file.";
            exit();
        }
    }

    // SQL query mengubah data
    $sql_update = "UPDATE daftar_roti SET nama_roti='$nama', diameter='$diameter', warna='$warna', harga='$harga', foto='$foto' 
                    WHERE id=$id";

    // Mengecek apakah $conn sudah ada sebelum digunakan unutuk mengeksekusi sql
    if (isset($conn)) {
        if ($conn->query($sql_update) === TRUE) { //eksekusi sql
            header('Location: daftar_roti.php'); //menuju halaman web daftar roti
            exit();
        } else {
            echo "Error: " . $sql_update . "<br>" . $conn->error; //jika eror akan menampilkan pesan
        }
    } else {
        echo "Error: Database connection not established.";
    }
}
$conn->close(); //mengakhiri koneksi database
