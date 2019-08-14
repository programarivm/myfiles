<?php

namespace MyFiles\Utils;

class Filesystem
{
    public static function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    is_dir($dir."/".$object) ? self::rrmdir($dir."/".$object) : unlink($dir."/".$object);
                }
            }
        }
    }
}
