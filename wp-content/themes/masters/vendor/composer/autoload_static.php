<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17b2e6367b33fddd0db0e938a2bd9327
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit17b2e6367b33fddd0db0e938a2bd9327::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit17b2e6367b33fddd0db0e938a2bd9327::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
