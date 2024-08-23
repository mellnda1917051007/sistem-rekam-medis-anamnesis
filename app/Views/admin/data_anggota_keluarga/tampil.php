<?= $this->extend(\Config\Setting::instance()->tmp_views()) ?>
<?php
include dirname(__FILE__) . '/index.php';

$this->section('halaman')

?>

<body>
    <a href="<?php index(); ?>/tambah">
        <?php btn_tambah('Tambah'); ?>
    </a>
    <?php /*
    <a target="blank" href="cetak.php?berdasarkan=data_anggota_keluarga&jenis=xls&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_export('Export Excel'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_anggota_keluarga&jenis=print&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_cetak('Cetak'); ?>
    </a>
     */
    ?>
    <a href="<?php index(); ?>">
        <?php btn_refresh('Refresh'); ?>
    </a>

    <br><br>

    <form name="formcari" id="formcari" action="" method="get">
        <fieldset>
            <table>
                <tbody>
                    <tr>
                        <td>Berdasarkan</td>
                        <td>:</td>
                        <td>
                            <!-- <input value="" name="Berdasarkan" id="Berdasarkan" > --> <select class="form-control selectpicker" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
                                <?php
                                foreach ($desc_tabel as $row) {
                                    echo "<option name='berdasarkan' value=$row[Field]>$row[Field]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Pencarian</td>
                        <td>:</td>
                        <td>
                            <!--<input class="form-control" type="text" name="isi" value="" >--> <input type="text" name="isi" value="">
                            <?php btn_cari('Cari'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>

    <div style="overflow-x:auto;">
        <table <?php tabel(100, '%', 1, 'left'); ?>>
            <tr>
                <th>Action</th>				
<th>No</th>				
<th>Id Anggota Keluarga</th>				
<th>Id Pasien</th>				
<th align="center" class="th_border cell" >Nama</th>				
<th align="center" class="th_border cell" >Alamat</th>				
<th align="center" class="th_border cell" >No Telepon</th>				
<th align="center" class="th_border cell" >Username</th>				
<th align="center" class="th_border cell" >Password</th>
            </tr>

            <tbody>
                <?php
                $no = ($pager->getCurrentPage() - 1) * $pager->getPerPage();

                foreach ($data_anggota_keluarga as $data) { ?>
                    <tr class="event2">
                        <td class="th_border cell" align="center" width="200">
                            <table border="0">
                                <tr>
                                    <td>
                                        <a href="<?php index(); ?>/detail?proses=<?= encrypt($data['id_anggota_keluarga']); ?>">
                                            <?php btn_detail('Detail'); ?></a>
                                    </td>
                                    <td>
                                        <a href="<?php index(); ?>/edit?proses=<?= encrypt($data['id_anggota_keluarga']); ?>">
                                            <?php btn_edit('Edit'); ?></a>
                                    </td>
                                    <td>
                                        <a onclick="hapus_data('<?= encrypt($data['id_anggota_keluarga']); ?>')">
                                            <?php btn_hapus('Hapus'); ?></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td align="center" width="50">
                        <?php
                            $no = (($no + 1));
                            echo $no;
                            ?>
                        </td>
                        <td align="center"><?php echo $data['id_anggota_keluarga']; ?></td>				
<td align="center">
<?php
$data_pasien = \App\Repo\admin\DataAnggotaKeluargaRepo::get_data_pasien($data['id_pasien']);
if ($data_pasien) {
    echo $data_pasien['id_petugas'];
}
?>
</td>				
<td align="center"><?php echo $data['nama']; ?></td>				
<td align="center"><?php echo $data['alamat']; ?></td>				
<td align="center"><?php echo $data['no_telepon']; ?></td>				
<td align="center"><?php echo $data['username']; ?></td>				
<td align="center"><?php echo $data['password']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    Jumlah <?= $pager->getTotal() ?> data, Halaman <?= $pager->getCurrentPage() ?> Dari <?= $pager->getLastPage() ?> Halaman
    <?php
    echo $pager->links();
    ?>

</body>

<?= $this->endSection() ?>

<?php
$this->section("script");
?>

<script>
    function hapus_data(id) {
        Swal.fire({
            icon: 'question',
            text: 'Anda yakin ingin menghapus data ini ?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = `hapus/${id}`;
            }
        })
    }
</script>

<?php
$this->endSection();
?>
