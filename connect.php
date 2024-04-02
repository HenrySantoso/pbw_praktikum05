<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "henry_bakery";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->connect_error or die("Koneksi Gagal : " . $conn->connect_error);
