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

abstract class BaseData
{
    /**
     * @var string
     */
    protected $className;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var string
     */
    protected $nameSpace;

    /**
     * @var array
     */
    protected $useStatementList = array();

    /**
     * @var array
     */
    protected $entityMap = array();

    /**
     * Return class name
     *
     * @return string
     */
    protected function getClassName()
    {
        return $this->className;
    }

    /**
     * Set class name
     *
     * @param string $className
     */
    protected function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * Return table name
     *
     * @return string
     */
    protected function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set table name
     *
     * @param string $tableName
     */
    protected function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    /**
     * Return namespace
     *
     * @return string
     */
    protected function getNameSpace()
    {
        return $this->nameSpace;
    }

    /**
     * Set namespace
     *
     * @param string $nameSpace
     */
    protected function setNameSpace($nameSpace)
    {
        $this->nameSpace = $nameSpace;
    }

    /**
     * Return use statement list
     *
     * @return array
     */
    protected function getUseStatementList()
    {
        return $this->useStatementList;
    }

    /**
     * Set use statement
     *
     * @param string $useStatement
     */
    protected function setUseStatementList($useStatement)
    {
        array_push($this->useStatementList, $useStatement);
    }

    /**
     * Return entity map
     *
     * @return array
     */
    protected function getEntityMap()
    {
        return $this->entityMap;
    }

    /**
     * Set entity map
     *
     * @param array $field
     */
    protected function setEntityMap($field)
    {
        array_push($this->entityMap, $field);
    }
}