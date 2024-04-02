<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Roti</title>
</head>

<body>
    <?php
    include("connect.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $result = $conn->query("SELECT * FROM daftar_roti WHERE id = '$id'") or die($conn->error);
        $row = $result->fetch_assoc();
        extract($row);
    } else {
        echo "ID tidak diberikan.";
        exit();
    }
    ?>
    <form action="proses_update_roti.php" method="post" enctype="multipart/form-data">
        <table border="1" align="center">
            <caption>Ubah Data Roti</caption>
            <tr>
                <td>Id Roti</td>
                <td><input type="text" name="id_roti" value="<?= $id ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Roti</td>
                <td><input type="text" name="nama_roti" value="<?= $nama_roti ?>"></td>
            </tr>
            <tr>
                <td>Diameter</td>
                <td>
                    <select name="diameter_roti">
                        <option value="" <?php echo ($diameter === "") ? 'selected' : ''; ?>></option>
                        <option value="10" <?php echo ($diameter == "10") ? 'selected' : ''; ?>>10 cm</option>
                        <option value="15" <?php echo ($diameter == "15") ? 'selected' : ''; ?>>15 cm</option>
                        <option value="20" <?php echo ($diameter == "20") ? 'selected' : ''; ?>>20 cm</option>
                        <option value="25" <?php echo ($diameter == "25") ? 'selected' : ''; ?>>25 cm</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Warna Roti</td>
                <td>
                    <select name="warna_roti">
                        <option value="" <?php echo ($warna === "") ? 'selected' : ''; ?>></option>
                        <option value="Putih" <?php echo ($warna == "Putih") ? 'selected' : ''; ?>>Putih</option>
                        <option value="Merah" <?php echo ($warna == "Merah") ? 'selected' : ''; ?>>Merah</option>
                        <option value="Biru" <?php echo ($warna == "Biru") ? 'selected' : ''; ?>>Biru</option>
                        <option value="Kuning" <?php echo ($warna == "Kuning") ? 'selected' : ''; ?>>Kuning</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga_roti" value="<?= $harga ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="file" name="foto_roti">
                    <?php
                    if (!empty($foto)) {
                        echo "<br>Existing File: $foto";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </th>
            </tr>
        </table>
    </form>
</body>

</html>