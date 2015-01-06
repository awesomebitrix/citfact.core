<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core;

use Citfact\Core\ClassLoader\ClassLoader;
use Citfact\Core\ClassLoader\ClassLoaderInterface;
use Citfact\Core\DependencyInjection\ContainerLoader;
use Citfact\Core\DependencyInjection\ContainerLoaderInterface;

class Bootstrap
{
    /**
     * @var string
     */
    protected $currentModuleName;

    /**
     * @var ContainerLoaderInterface
     */
    protected $container;

    /**
     * Construct object
     *
     * @param string $moduleName
     */
    public function __construct($moduleName)
    {
        $this->currentModuleName = $moduleName;
    }

    /**
     * Initial loading module
     */
    public function run()
    {
        $this->registerNamespace(new ClassLoader());
    }

    /**
     * @param ClassLoaderInterface $classLoader
     */
    protected function registerNamespace(ClassLoaderInterface $classLoader)
    {
        $classLoader->registerByModuleName($this->currentModuleName);
    }
}