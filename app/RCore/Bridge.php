<?php 

namespace App\RCore;

class Bridge
{
    static function link($link)
    {
        $link = str_replace("index.php", "", $link);
        $link = str_replace("..", "", $link);
        if (strpos($link, "input")){
            $link = str_replace("/?", "/cetak?", $link);
        }
        return base_url("admin") . $link;
    }
}
