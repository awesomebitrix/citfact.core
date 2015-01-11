<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\Module;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\Console\Application;

interface ModuleInterface
{
    /**
     * Return store path components
     *
     * @param bool $absolute
     * @return string
     */
    public function getComponentsPath($absolute = true);

    /**
     * Check install module
     *
     * @return bool
     */
    public function isInstalled();

    /**
     * Return activate date module
     *
     * @return string|null
     */
    public function getInstallDate();

    /**
     * Get name space module.
     * If module name citfact.core, then return Citfact\\Core
     *
     * @return string
     */
    public function getNamespace();

    /**
     * Return path, where install module
     *
     * @return string|null
     */
    public function getModulePath();

    /**
     * Registers Commands.
     *
     * @param Application $application
     */
    public function registerCommands(Application $application);

    /**
     * Return module name
     *
     * @return string
     */
    public function getName();

    /**
     * Returns the modules container extension.
     *
     * @return ExtensionInterface|null
     */
    public function getContainerExtension();
}