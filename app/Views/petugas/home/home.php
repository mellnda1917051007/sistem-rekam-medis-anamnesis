<?= $this->extend(\Config\Setting_Petugas::instance()->tmp_views()) ?>
<?php
include dirname(__FILE__) . '/index.php';
$this->section('halaman')
?>
<h5>
    <?php
    \App\RCore\Setting_Petugas::instance()->sambutan();
    ?>
</h5>
<?php
$this->endSection();
?>