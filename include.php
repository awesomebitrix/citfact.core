<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\ClassLoader\UniversalClassLoader;

if (file_exists($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
}

$loader = new UniversalClassLoader();
$loader->register();
$loader->registerNamespace('Citfact\\Core', __DIR__.'/src');
