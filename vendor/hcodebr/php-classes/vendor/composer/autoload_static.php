<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e82e4de9708cfb525883d96e17bd3c8
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit1e82e4de9708cfb525883d96e17bd3c8::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
