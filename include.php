<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Citfact\Core\Bootstrap;

// Include composer autload
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

// Include bootstrap module
require_once __DIR__.'/src/Citfact/Core/Bootstrap.php';

$bootstrap = new Bootstrap();
$bootstrap->run();