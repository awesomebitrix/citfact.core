<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\DependencyInjection;

use Bitrix\Main\ModuleManager;
use Citfact\Core\Module\Module;
use Citfact\Core\Module\ModuleInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ContainerLoader implements ContainerLoaderInterface
{
    /**
     * @var ModuleInterface[]
     */
    protected $modules = array();

    /**
     * @var ContainerBuilder
     */
    protected $container;

    /**
     * Initializes the service container.
     */
    public function initializeContainer()
    {
        $this->initializeModules();
        $this->buildContainer();
    }

    /**
     * Initializes modules
     */
    protected function initializeModules()
    {
        $installedModules = ModuleManager::getInstalledModules();
        foreach ($installedModules as $module) {
            $module = new Module($module['ID']);
            $this->modules[$module->getName()] = $module;
        }
    }

    /**
     * Builds the service container.
     */
    protected function buildContainer()
    {
        $container = $this->getContainerBuilder();
        $this->registerExtensionModules($container);
    }

    /**
     * Register extension modules
     *
     * @param ContainerBuilder $container
     */
    protected function registerExtensionModules(ContainerBuilder $container)
    {
        foreach ($this->modules as $module) {
            if ($extension = $module->getContainerExtension()) {
                $container->registerExtension($extension);
            }
        }
    }

    /**
     * Gets a new ContainerBuilder instance used to build the service container.
     *
     * @return ContainerBuilder
     */
    protected function getContainerBuilder()
    {
        $container = new ContainerBuilder();

        return $container;
    }

    /**
     * Gets the current container.
     */
    public function getContainer()
    {
        return $this->container;
    }
}