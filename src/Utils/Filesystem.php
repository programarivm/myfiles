<?php

namespace MyFiles\Utils;

class Filesystem
{
    public static function rmDir($path)
    {
        $files = glob($path . '/*');

        foreach ($files as $file) {
            is_dir($file) ? self::rmDir($file) : unlink($file);
        }

        if (self::isEmptyDir($path)) {
            rmdir($path);
        }

        return;
    }

    public static function isEmptyDir($path)
    {
        if (!is_dir($path)) {
            return false;
        }

        foreach (scandir($path) as $file) {
            if (!in_array($file, ['.','..'])) {
                return false;
            }
        }

        return true;
    }
}
