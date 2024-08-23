<?php

namespace Config;


class Setting
{
    static $setting;

    private const TMP = "tmp";

    public function tmp()
    {
        return self::TMP . "/superial";
    }

    public function charset()
    {
        return "utf-8";
    }

    public function judul()
    {
        return "Crud Ridikc";
    }

    public function avatar()
    {
        return base_url("image/avatar/avatar11.png");
    }

    public function author()
    {
        return "ridikc";
    }

    public function description()
    {
        return "ridick sofware development center";
    }

    public function keywords()
    {
        return "software app";
    }

    public function tmp_views()
    {
        return $this->tmp() . "/index.php";
    }

    public function siapa()
    {
        return "test";
    }

    static function instance()
    {
        if (self::$setting) {
            return self::$setting;
        }
        self::$setting = new self();
        return self::$setting;
    }
}
