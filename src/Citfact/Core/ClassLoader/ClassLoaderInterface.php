<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\ClassLoader;

interface ClassLoaderInterface
{
    /**
     * @param string $moduleName
     */
    public function registerByModuleName($moduleName);
}