<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\EntityGenerator\Model;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class EntityTemplateTable extends Entity\DataManager
{
    /**
     * {@inheritdoc}
     */
    public static function getFilePath()
    {
        return __FILE__;
    }

    /**
     * {@inheritdoc}
     */
    public static function getTableName()
    {
        return 'b_citfact_entity_template';
    }

    /**
     * {@inheritdoc}
     */
    public static function getMap()
    {
        return array();
    }
}