<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit03ba06c2bf76aeafb07a4b1e403193fe
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Php\\Projetop1\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Php\\Projetop1\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit03ba06c2bf76aeafb07a4b1e403193fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit03ba06c2bf76aeafb07a4b1e403193fe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit03ba06c2bf76aeafb07a4b1e403193fe::$classMap;

        }, null, ClassLoader::class);
    }
}
