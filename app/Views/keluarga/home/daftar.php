<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="login-container">
        <h2>Daftar</h2>
        <form action="<?php echo base_url(route_to("keluarga.daftar.proses")) ?>" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="id_anggota_keluarga">ID Anggota Keluarga</label>
                <input type="text" id="id_anggota_keluarga" name="id_anggota_keluarga" required value="<?php echo id_otomatis("data_anggota_keluarga", "id_anggota_keluarga", "10"); ?>">
            </div>
            <div class="form-group">
                <label for="id_pasien">ID Pasien</label>
                <input type="text" name="id_pasien" id="id_pasien" list="datalist_id_pasien" required="required">
                <datalist id="datalist_id_pasien">
                    <?php
                    combo_database2("data_pasien", "id_pasien", "nama_lengkap", null);
                    ?>
                </datalist>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="no_telepon">No. Telepon</label>
                <input type="tel" id="no_telepon" name="no_telepon" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <td>
                    <?php btn_simpan(' SIMPAN'); ?>
                </td>
            </div>
        </form>
    </div>
</body>

</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 55px;
        max-width: 400px;
        width: 100%;
    }

    h2 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"],
    input[type="tel"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: #45a049;
    }
</style>