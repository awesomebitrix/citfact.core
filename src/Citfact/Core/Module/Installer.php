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

abstract class Installer extends \CModule
{
    /**
     * @var Module
     */
    protected $module;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->module = new Module($this->MODULE_ID);
    }

    /**
     * @return null|string
     */
    protected function getModulePath()
    {
        return $this->module->getModulePath();
    }

    /**
     * @param bool $absolute
     * @return string
     */
    protected function getComponentsPath($absolute = true)
    {
        return $this->module->getComponentsPath($absolute);
    }
}