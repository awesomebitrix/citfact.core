<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\Console;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Citfact\Core\Module\Module;
use Bitrix\Main\ModuleManager;

class Application extends BaseApplication
{
    private $commandsRegistered = false;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct('Citfact 1C-Bitrix console utilities', '0.0.1');
    }

    /**
     * Runs the current application.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        if (!$this->commandsRegistered) {
            $this->registerCommands();
            $this->commandsRegistered = true;
        }

        return parent::doRun($input, $output);
    }

    /**
     * Register modules commands
     */
    protected function registerCommands()
    {
        $installedModules = ModuleManager::getInstalledModules();
        foreach ($installedModules as $module) {
            $module = new Module($module['ID']);
            $module->registerCommands($this);
        }
    }
}