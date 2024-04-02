<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Roti</title>
</head>

<body>
    <form action="proses_tambah_roti.php" method="post" enctype="multipart/form-data">
        <table border="1" align="center">
            <caption>Tambah Data Roti Baru</caption>
            <tr>
                <td>Nama Roti</td>
                <td><input type="text" name="nama_roti"></td>
            </tr>
            <tr>
                <td>Diameter</td>
                <td>
                    <select name="diameter_roti">
                        <option value="10" selected>10 cm</option>
                        <option value="15">15 cm</option>
                        <option value="20">20 cm</option>
                        <option value="25">25 cm</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Warna Roti</td>
                <td>
                    <select name="warna_roti">
                        <option value="Putih" selected>Putih</option>
                        <option value="Merah">Merah</option>
                        <option value="Biru">Biru</option>
                        <option value="Kuning">Kuning</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga_roti"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto_roti"></td>
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