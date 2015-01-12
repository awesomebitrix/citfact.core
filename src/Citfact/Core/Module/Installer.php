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

use Citfact\Core\Filesystem\Filesystem;

abstract class Installer extends \CModule
{
    /**
     * @var Module
     */
    protected $module;

    /**
     * @var \Citfact\Core\Filesystem\Filesystem
     */
    protected $fs;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->module = new Module($this->MODULE_ID);
        $this->fs = new Filesystem;
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

    /**
     * @return void
     */
    protected function copyAdminFiles()
    {
        $moduleAdminDirectory = $this->getModulePath().'/admin';
        if (!$this->fs->isDirectory($moduleAdminDirectory)) {
            return;
        }

        $bitrixAdminStore = $this->getAdminStore();
        $moduleAdminFiles = $this->fs->getFilesDirectory($moduleAdminDirectory);

        foreach ($moduleAdminFiles as $file) {
            if ($file == 'menu.php') {
                continue;
            }

            $this->fs->touch($bitrixAdminStore.'/'.$file);
            $this->fs->put($bitrixAdminStore.'/'.$file,  $this->getAdminFixture($moduleAdminDirectory.'/'.$file));
        }
    }

    /**
     * @return void
     */
    protected function removeAdminFiles()
    {
        $moduleAdminDirectory = $this->getModulePath().'/admin';
        if (!$this->fs->isDirectory($moduleAdminDirectory)) {
            return;
        }

        $bitrixAdminStore = $this->getAdminStore();
        $moduleAdminFiles = $this->fs->getFilesDirectory($moduleAdminDirectory);

        foreach ($moduleAdminFiles as $file) {
            if ($file == 'menu.php' || !$this->fs->isFile($bitrixAdminStore.'/'.$file)) {
                continue;
            }

            $this->fs->remove($bitrixAdminStore.'/'.$file);
        }
    }

    /**
     * @param string $path
     * @return string
     */
    protected function getAdminFixture($path)
    {
        return sprintf('<? require $_SERVER[\'DOCUMENT_ROOT\'].\'/%s\' ?>', $path);
    }

    /**
     * @return string
     */
    protected function getAdminStore()
    {
        return $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin';
    }
}