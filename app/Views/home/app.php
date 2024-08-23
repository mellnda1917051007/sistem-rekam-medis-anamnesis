<br>
<center>
    <h2>Selamat Datang di Website Rekam Medis Kesehatan Mental, Silahkan Login</h2>
</center>
<br>
<br>
<br>
<br>
<br>
<div class="access-container">
    <div class="access-card">
        <div class="card-header">
            <h2>Admin</h2>
        </div>
        <div class="card-body">
            <p>Anda masuk sebagai admin. Anda memiliki akses penuh untuk mengelola sistem.</p>
            <a href="admin/login" class="btn">Login</a>
        </div>
    </div>

    <div class="access-card">
        <div class="card-header">
            <h2>Petugas</h2>
        </div>
        <div class="card-body">
            <p>Anda masuk sebagai petugas. Anda memiliki akses untuk tugas-tugas tertentu dalam sistem.</p>
            <a href="petugas/login" class="btn">Login</a>
        </div>
    </div>

    <div class="access-card">
        <div class="card-header">
            <h2>Keluarga</h2>
        </div>
        <div class="card-body">
            <p>Anda masuk sebagai anggota keluarga. Anda memiliki akses terbatas untuk informasi keluarga.</p>
            <a href="keluarga/login" class="btn">Login</a>
        </div>
    </div>
</div>
<style>
    .access-container {
        display: flex;
        justify-content: space-around;
    }

    .access-card {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 30%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        border-radius: 5px 5px 0 0;
    }

    .card-header h2 {
        margin: 0;
    }

    .card-body {
        padding: 20px 20px;
    }

    .card-body p {
        margin-bottom: 15px;
    }

    .btn {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
    }

    .btn:hover {
        background-color: #45a049;
    }
</style>