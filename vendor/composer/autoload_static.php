<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbec0b4218963b775867e9ec211507429
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbec0b4218963b775867e9ec211507429::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbec0b4218963b775867e9ec211507429::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
