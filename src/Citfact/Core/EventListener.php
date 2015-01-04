<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class EventListener
{
    /**
     * Add citfact section in global admin menu
     *
     * @param array $globalMenu
     * @param array $moduleMenu
     * @return mixed
     */
    public static function adminGlobalMenu($globalMenu, $moduleMenu)
    {
        /** @global CMain $APPLICATION */
        global $APPLICATION;

        $APPLICATION->SetAdditionalCSS('/bitrix/themes/.default/citfact_core.css');

        return array(
            'global_menu_citfact' => array(
                'menu_id' => 'citfact',
                'page_icon' => 'citfact_title_icon',
                'index_icon' => 'citfact_page_icon',
                'text' => Loc::getMessage('GLOBAL_MENU_CITFACT'),
                'title' => Loc::getMessage('GLOBAL_MENU_CITFACT'),
                'sort' => 200,
                'items_id' => 'global_menu_citfact',
                'help_section' => 'citfact',
                'items' => array()
            )
        );
    }
}