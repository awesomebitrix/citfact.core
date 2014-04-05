<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$documentRoot = getenv('DOCUMENT_ROOT');
if (file_exists($documentRoot . '/local/modules/citfact.core/admin/user_vars_edit.php')) {
    require_once $documentRoot . '/local/modules/citfact.core/admin/user_vars_edit.php';
} else {
    require_once $documentRoot . '/bitrix/modules/citfact.core/admin/user_vars_edit.php';
}