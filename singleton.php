<?php

class Singleton {
    private static $instance;

    private function __construct() {}

    public static function shared() {
        if (static::$instance == null) {
            static::$instance = new Singleton();
        }
        return static::$instance;
    }
}

$s1 = Singleton::shared();
$s2 = Singleton::shared();

if ($s1 == $s2) {
    echo "same class";
}
