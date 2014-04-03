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

return array(
    'parent_menu' => 'global_menu_citfact',
    'section' => 'user_vars',
    'sort' => 200,
    'text' => Loc::getMessage('USER_VARS_TITLE'),
    'url' => 'user_vars.php?lang=' . LANGUAGE_ID,
    'icon' => 'user_vars_menu_icon',
    'page_icon' => 'user_vars_page_icon',
    'more_url' => array(),
    'items_id' => 'uservars_menu',
    'items' => array(),
);

