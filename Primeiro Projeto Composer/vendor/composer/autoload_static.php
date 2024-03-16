<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite33747a597434235c6c9b71a7cd43c01
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Php\\Primeiroprojeto\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Php\\Primeiroprojeto\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite33747a597434235c6c9b71a7cd43c01::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite33747a597434235c6c9b71a7cd43c01::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite33747a597434235c6c9b71a7cd43c01::$classMap;

        }, null, ClassLoader::class);
    }
}