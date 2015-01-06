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

use Citfact\Core\Module\Module;
use Symfony\Component\ClassLoader\ClassLoader as BaseClassLoader;

class ClassLoader extends BaseClassLoader implements ClassLoaderInterface
{
    /**
     * Register module classes
     *
     * @param string $moduleName
     */
    public function registerByModuleName($moduleName)
    {
        $module = new Module($moduleName);

        if ($module->isInstalled()) {
            $modulePath = $module->getModulePath();
            $moduleNamespace = $module->getNamespace();

            $this->addPrefix($moduleNamespace, $modulePath.'/src');
            $this->addPrefix($moduleNamespace, $modulePath.'/lib');

            $this->register();
        }
    }
}