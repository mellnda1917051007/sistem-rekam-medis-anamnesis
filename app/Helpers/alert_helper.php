<?php

class SweetAlert
{

    private static $flash_berhasil = "alert_berhasil";

    static function load()
    {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css"
              href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
        <?php
        self::flash_berhasil();
    }

    private static function flash_berhasil()
    {
        if (session()->has(self::$flash_berhasil)) {
            ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: '<?= session(self::$flash_berhasil) ?>'
                })
            </script>
            <?php
        }
    }

    static function alert_berhasil($text)
    {
        session()->setFlashdata(self::$flash_berhasil, $text);
    }
}
