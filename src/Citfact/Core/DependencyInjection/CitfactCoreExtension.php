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
use Symfony\Component\DependencyInjection\Extension\Extension as BaseExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

class CitfactCoreExtension extends BaseExtension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../../../../resources/config'));
        $loader->load('core_service.xml');

        // Load advertising module services
        if ($this->isModuleInstalled('advertising')) {
            $loader->load('bitrix/advertising.xml');
        }

        // Load blog module services
        if ($this->isModuleInstalled('blog')) {
            $loader->load('bitrix/blog.xml');
        }

        // Load catalog module services
        if ($this->isModuleInstalled('catalog')) {
            $loader->load('bitrix/catalog.xml');
        }

        // Load currency module services
        if ($this->isModuleInstalled('currency')) {
            $loader->load('bitrix/currency.xml');
        }

        // Load iblock module services
        if ($this->isModuleInstalled('iblock')) {
            $loader->load('bitrix/iblock.xml');
        }

        // Load learning module services
        if ($this->isModuleInstalled('learning')) {
            $loader->load('bitrix/learning.xml');
        }

        // Load main module services
        if ($this->isModuleInstalled('main')) {
            $loader->load('bitrix/main.xml');
        }

        // Load pull module services
        if ($this->isModuleInstalled('pull')) {
            $loader->load('bitrix/pull.xml');
        }

        // Load sale module services
        if ($this->isModuleInstalled('sale')) {
            $loader->load('bitrix/sale.xml');
        }

        // Load search module services
        if ($this->isModuleInstalled('search')) {
            $loader->load('bitrix/search.xml');
        }

        // Load socialnetwork module services
        if ($this->isModuleInstalled('socialnetwork')) {
            $loader->load('bitrix/socialnetwork.xml');
        }

        // Load statistic module services
        if ($this->isModuleInstalled('statistic')) {
            $loader->load('bitrix/statistic.xml');
        }

        // Load subscribe module services
        if ($this->isModuleInstalled('subscribe')) {
            $loader->load('bitrix/subscribe.xml');
        }

        // Load support module services
        if ($this->isModuleInstalled('support')) {
            $loader->load('bitrix/support.xml');
        }

        // Load webservice module services
        if ($this->isModuleInstalled('webservice')) {
            $loader->load('bitrix/webservice.xml');
        }

        // Load wiki module services
        if ($this->isModuleInstalled('wiki')) {
            $loader->load('bitrix/wiki.xml');
        }

        // Load highloadblock module services
        if ($this->isModuleInstalled('highloadblock')) {
            $loader->load('bitrix_d7/highloadblock.xml');
        }
    }

    /**
     * @param string $moduleName
     * @return bool
     */
    private function isModuleInstalled($moduleName)
    {
        return ModuleManager::isModuleInstalled($moduleName);
    }
}