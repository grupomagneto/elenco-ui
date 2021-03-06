<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad2dbfcf05f9a09b380d6299d8e4cb71
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Andreyco\\Instagram\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Andreyco\\Instagram\\' => 
        array (
            0 => __DIR__ . '/..' . '/andreyco/instagram/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad2dbfcf05f9a09b380d6299d8e4cb71::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad2dbfcf05f9a09b380d6299d8e4cb71::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
