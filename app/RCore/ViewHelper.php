<?php

namespace RCore;

class ViewHelper
{
    static function render_error($message)
    {
        if ($message) {
            return "";
        }
    }
}
