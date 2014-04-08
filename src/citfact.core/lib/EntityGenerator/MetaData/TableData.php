<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\EntityGenerator\MetaData;

use Bitrix\Main\Application;
use Citfact\Core\EntityGenerator\Exception;

class TableData extends BaseData
{
    /**
     * @var Bitrix\Main\DB\ConnectionPool
     */
    private $connection;

    /**
     * Construct ocject
     *
     * @param string $tableName
     */
    public function __construct($tableName)
    {
        $this->connection = Application::getConnection();
        $this->initTableData($tableName);
    }

    /**
     * @var string $tableName
     * @throws \Citfact\Core\EntityGenerator\Exception\MetaDataException
     */
    private function initTableData($tableName)
    {
        $sql = sprintf('SHOW COLUMNS FROM %s', $tableName);

        try {
            $result = $this->connection->query($sql);
        } catch (\Bitrix\Main\DB\SqlQueryException $e) {
            throw new Exception\MetaDataException(sprintf('Not found table %s', $tableName));
        }

        while ($row = $result->fetch()) {
        }

        $this->setTableName($tableName);
        $tableName = str_replace('b_', '', $tableName);
        $tableName = str_split(ucfirst($tableName));
        foreach ($tableName as $key => $value) {
            if ($value != '_') {
                continue;
            }

            $tableName[$key] = '';
            $nextChar = $key + 1;
            if (isset($tableName[$nextChar])) {
                $tableName[$nextChar] = ucfirst($tableName[$nextChar]);
            }
        }

        $this->setClassName(join($tableName));
    }
}