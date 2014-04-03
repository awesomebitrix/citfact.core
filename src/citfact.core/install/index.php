<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;

Loc::loadMessages(__FILE__);

class citfact_core extends CModule
{
    /**
     * @var string
     */
    public $MODULE_ID = 'citfact.core';

    /**
     * @var string
     */
    public $MODULE_VERSION;

    /**
     * @var string
     */
    public $MODULE_VERSION_DATE;

    /**
     * @var string
     */
    public $MODULE_NAME;

    /**
     * @var string
     */
    public $MODULE_DESCRIPTION;

    /**
     * @var string
     */
    public $PARTNER_NAME;

    /**
     * @var string
     */
    public $PARTNER_URI;

    /**
     * @var Bitrix\Main\DB\ConnectionPool
     */
    private $connection;

    /**
     * Construct object
     */
    public function __construct()
    {
        $this->MODULE_NAME = Loc::getMessage('CORE_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('CORE_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('PARTNER_URI');
        $this->MODULE_PATH = $this->getModulePath();

        $arModuleVersion = array();
        include $this->MODULE_PATH . '/install/version.php';

        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

        $this->connection = Application::getConnection();
    }

    /**
     * Return path module
     *
     * @return string
     */
    protected function getModulePath()
    {
        $modulePath = explode('/', __FILE__);
        $modulePath = array_slice($modulePath, 0, array_search($this->MODULE_ID, $modulePath) + 1);

        return join('/', $modulePath);
    }

    /**
     * Return components path for install
     *
     * @param bool $absolute
     * @return string
     */
    protected function getComponentsPath($absolute = true)
    {
        $documentRoot = getenv('DOCUMENT_ROOT');
        if (strpos($this->MODULE_PATH, 'local/modules') !== false) {
            $componentsPath = '/local/components';
        } else {
            $componentsPath = '/bitrix/components';
        }

        if ($absolute) {
            $componentsPath = sprintf('%s%s', $documentRoot, $componentsPath);
        }

        return $componentsPath;
    }

    /**
     * Install module
     *
     * @return void
     */
    public function DoInstall()
    {
        RegisterModule($this->MODULE_ID);

        $this->InstallFiles();
        $this->InstallDB();
        $this->InstallEvents();
    }

    /**
     * Remove module
     *
     * @return void
     */
    public function DoUninstall()
    {
        $this->UnInstallDB();
        $this->UnInstallFiles();
        $this->UnInstallEvents();

        UnRegisterModule($this->MODULE_ID);
    }

    /**
     * Add tables to the database
     *
     * @return bool
     */
    public function InstallDB()
    {
        $sqlBatch = file_get_contents($this->MODULE_PATH . '/install/db/install.sql');
        $sqlBatchErrors = $this->connection->executeSqlBatch($sqlBatch);
        if (sizeof($sqlBatchErrors) > 0) {
            return false;
        }

        return true;
    }

    /**
     * Remove tables from the database
     *
     * @return bool
     */
    public function UnInstallDB()
    {
        $sqlBatch = file_get_contents($this->MODULE_PATH . '/install/db/uninstall.sql');
        $sqlBatchErrors = $this->connection->executeSqlBatch($sqlBatch);
        if (sizeof($sqlBatchErrors) > 0) {
            return false;
        }

        return true;
    }

    /**
     * Add post events
     *
     * @return bool
     */
    public function InstallEvents()
    {
        RegisterModuleDependences('main', 'OnBuildGlobalMenu', $this->MODULE_ID, 'Citfact\Core\EventListener', 'adminGlobalMenu');

        return true;
    }


    /**
     * Delete post events
     *
     * @return bool
     */
    public function UnInstallEvents()
    {
        UnRegisterModuleDependences('main', 'OnBuildGlobalMenu', $this->MODULE_ID, 'Citfact\Core\EventListener', 'adminGlobalMenu');

        return true;
    }

    /**
     * Copy files module
     *
     * @return bool
     */
    public function InstallFiles()
    {
        CopyDirFiles($this->MODULE_PATH . '/install/themes', getenv('DOCUMENT_ROOT') . '/bitrix/themes', true, true);
        CopyDirFiles($this->MODULE_PATH . '/install/images', getenv('DOCUMENT_ROOT') . '/bitrix/images', true, true);
        CopyDirFiles($this->MODULE_PATH . '/install/admin', getenv('DOCUMENT_ROOT') . '/bitrix/admin', true, true);

        return true;
    }

    /**
     * Remove files module
     *
     * @return bool
     */
    public function UnInstallFiles()
    {
        DeleteDirFiles($this->MODULE_PATH . '/install/themes/.default', getenv('DOCUMENT_ROOT') . '/bitrix/themes/.default');
        DeleteDirFiles($this->MODULE_PATH . '/install/admin', getenv('DOCUMENT_ROOT') . '/bitrix/admin');
        DeleteDirFilesEx('/bitrix/images/citfact.core/');

        return true;
    }
}
