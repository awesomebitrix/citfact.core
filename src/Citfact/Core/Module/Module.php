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
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Loader;

class Module implements ModuleInterface
{
    const DELIMITER_MODULE_NAME = '.';

    /**
     * @var string
     */
    protected $moduleName;

    /**
     * @var ExtensionInterface
     */
    protected $extension;

    /**
     * @param string $moduleName
     */
    public function __construct($moduleName)
    {
        $this->moduleName = $moduleName;
    }

    /**
     * {@inheritdoc}
     */
    public function isInstalled()
    {
        return ModuleManager::isModuleInstalled($this->moduleName);
    }

    /**
     * {@inheritdoc}
     */
    public function getInstallDate()
    {
        $installedModules = ModuleManager::getInstalledModules();
        if (isset($installedModules[$this->moduleName])) {
            return $installedModules[$this->moduleName]['DATE_ACTIVE'];
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        if (strpos($this->moduleName, self::DELIMITER_MODULE_NAME) == false) {
            return ucfirst($this->moduleName);
        }

        $moduleName = explode(self::DELIMITER_MODULE_NAME, $this->moduleName);
        foreach ($moduleName as $key => $part) {
            $moduleName[$key] = ucfirst($part);
        }

        return implode('\\', $moduleName);
    }

    /**
     * {@inheritdoc}
     */
    public function getModulePath()
    {
        $documentRoot = Loader::getDocumentRoot();
        $modulePathBitrix = $documentRoot.'/'.Loader::BITRIX_HOLDER.'/modules/'.$this->moduleName;
        $modulePathLocal = $documentRoot.'/'.Loader::LOCAL_HOLDER.'/modules/'.$this->moduleName;

        if (is_dir($modulePathBitrix)) {
            return $modulePathBitrix;
        } elseif (is_dir($modulePathLocal)) {
            return $modulePathLocal;
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $class = $this->getContainerExtensionClass();
            if (class_exists($class)) {
                $extension = new $class();
                $this->extension = $extension;
            } else {
                $this->extension = false;
            }
        }

        if ($this->extension) {
            return $this->extension;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->moduleName;
    }

    /**
     * Returns the modules container extension class.
     *
     * @return string
     */
    protected function getContainerExtensionClass()
    {
        $basename = str_replace('\\', '', $this->getNamespace());

        return $this->getNamespace().'\\DependencyInjection\\'.$basename.'Extension';
    }
}