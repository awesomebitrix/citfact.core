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
use Bitrix\Main\EventManager;
use Citfact\Core\Module\Installer;

Loc::loadMessages(__FILE__);

class citfact_core extends Installer
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
     * @var \Bitrix\Main\EventManager
     */
    private $eventManager;

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

        $this->eventManager = EventManager::getInstance();
    }

    /**
     * Install module
     *
     * @return void
     */
    public function doInstall()
    {
        RegisterModule($this->MODULE_ID);

        $this->installFiles();
        $this->installDB();
        $this->installEvents();
    }

    /**
     * Remove module
     *
     * @return void
     */
    public function doUninstall()
    {
        $this->unInstallDB();
        $this->unInstallFiles();
        $this->unInstallEvents();

        UnRegisterModule($this->MODULE_ID);
    }

    /**
     * Add tables to the database
     *
     * @return bool
     */
    public function installDB()
    {
        return true;
    }

    /**
     * Remove tables from the database
     *
     * @return bool
     */
    public function unInstallDB()
    {
        return true;
    }

    /**
     * Add post events
     *
     * @return bool
     */
    public function installEvents()
    {
        $this->eventManager->registerEventHandler('main', 'OnBuildGlobalMenu', $this->MODULE_ID, 'Citfact\Core\EventListener\GlobalMenuListener', 'adminGlobalMenu');
        $this->eventManager->registerEventHandler('main', 'OnPageStart', $this->MODULE_ID, 'Citfact\Core\EventListener\InitModuleListener', 'includeModule');

        return true;
    }


    /**
     * Delete post events
     *
     * @return bool
     */
    public function unInstallEvents()
    {
        $this->eventManager->unRegisterEventHandler('main', 'OnBuildGlobalMenu', $this->MODULE_ID, 'Citfact\Core\EventListener\GlobalMenuListener', 'adminGlobalMenu');
        $this->eventManager->unRegisterEventHandler('main', 'OnPageStart', $this->MODULE_ID, 'Citfact\Core\EventListener\InitModuleListener', 'includeModule');

        return true;
    }

    /**
     * Copy files module
     *
     * @return bool
     */
    public function installFiles()
    {
        CopyDirFiles($this->MODULE_PATH . '/resources/themes', getenv('DOCUMENT_ROOT') . '/bitrix/themes', true, true);
        CopyDirFiles($this->MODULE_PATH . '/resources/images', getenv('DOCUMENT_ROOT') . '/bitrix/images', true, true);

        return true;
    }

    /**
     * Remove files module
     *
     * @return bool
     */
    public function unInstallFiles()
    {
        DeleteDirFiles($this->MODULE_PATH . '/resources/themes/.default', getenv('DOCUMENT_ROOT') . '/bitrix/themes/.default');
        DeleteDirFilesEx('/bitrix/images/citfact.core/');

        return true;
    }
}
