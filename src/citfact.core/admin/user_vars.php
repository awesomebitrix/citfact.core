<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once getenv('DOCUMENT_ROOT') . '/bitrix/modules/main/include/prolog_admin_before.php';

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Entity;

use Citfact\Core\UserVars;
use Citfact\Core\UserVars\Model;

Loc::loadMessages(__FILE__);

require_once getenv('DOCUMENT_ROOT') . '/bitrix/modules/main/include/prolog_admin_after.php';
require_once getenv('DOCUMENT_ROOT') . '/bitrix/modules/main/include/epilog_admin.php';