<?= $this->extend(\Config\Setting_Keluarga::instance()->tmp_views()) ?>
<?php
include dirname(__FILE__) . '/index.php';
$this->section('halaman')
?>
<h5>
    <?php
    \App\RCore\Setting_Keluarga::instance()->sambutan();
    ?>
</h5>
<?php
$this->endSection();
?>