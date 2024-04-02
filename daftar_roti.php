<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Roti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script defer src="script.js"></script>
</head>

<body>
    <?php
    include("connect.php");
    if (isset($_POST["delete"])) {
        $id = $_POST["id"];
        $conn->query("DELETE FROM daftar_roti WHERE id='$id'");
    }
    if (isset($_POST["update"])) {
        $id = $_POST["id"];
        header("Location:form_update_roti.php?id=$id");
    }

    ?>
    <table id="example" class="table table-striped" style="width:100%">
        <h1 align="center">Daftar Roti</h1>
        <thead>
            <tr>
                <th>id</th>
                <th>Nama Roti</th>
                <th>Diameter</th>
                <th>Warna</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $table = $conn->query("SELECT * FROM daftar_roti") or die($conn->error);
            while ($row = $table->fetch_assoc()) {
                extract($row);
            ?>
                <tr>
                    <td align="right"><?= $id ?></td>
                    <td><?= $nama_roti ?></td>
                    <td align="right"><?= $diameter ?></td>
                    <td><?= $warna ?></td>
                    <td align="right"><?= $harga ?></td>
                    <td><img src="<?= $foto ?>" width="70px"></td>
                    <form method="post">
                        <td align="center">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="submit" name="update" value="Update">
                        </td>
                        <td align="center">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="submit" name="delete" value="Delete">
                        </td>
                    </form>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <center>
        <a href="form_tambah_roti.php"><button>Tambah Roti</button></a>
    </center>
</body>

</html>