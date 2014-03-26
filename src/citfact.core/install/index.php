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

Loc::loadMessages(__FILE__);

class citfact_core extends CModule
{
    public $MODULE_ID = 'citfact.core';
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $PARTNER_NAME;
    public $PARTNER_URI;

    /**
     * Construct object
     */
    public function __construct()
    {
        $this->MODULE_NAME = Loc::getMessage('CORE_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('CORE_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('PARTNER_URI');

        $arModuleVersion = array();
        include $this->MODULE_PATH . '/install/version.php';

        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
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
        UnRegisterModule($this->MODULE_ID);

        $this->UnInstallDB();
        $this->UnInstallFiles();
        $this->UnInstallEvents();
    }

    /**
     * Add tables to the database
     *
     * @return bool
     */
    public function InstallDB()
    {
        return true;
    }

    /**
     * Remove tables from the database
     *
     * @return bool
     */
    public function UnInstallDB()
    {
        return true;
    }

    /**
     * Add post events
     *
     * @return bool
     */
    public function InstallEvents()
    {
        return true;
    }


    /**
     * Delete post events
     *
     * @return bool
     */
    public function UnInstallEvents()
    {
        return true;
    }

    /**
     * Copy files module
     *
     * @return bool
     */
    public function InstallFiles()
    {
        return true;
    }

    /**
     * Remove files module
     *
     * @return bool
     */
    public function UnInstallFiles()
    {
        return true;
    }
}
