<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

CModule::AddAutoloadClasses('citfact.core', array(
    'Citfact\Core\EventListener' => 'lib/EventListener.php',
    'Citfact\Core\UserVars\Vars' => 'lib/UserVars/Vars.php',
    'Citfact\Core\UserVars\VarsGroup' => 'lib/UserVars/VarsGroup.php',
    'Citfact\Core\UserVars\Model\VarsTable' => 'lib/UserVars/Model/VarsTable.php',
    'Citfact\Core\UserVars\Model\VarsGroupTable' => 'lib/UserVars/Model/VarsGroupTable.php',
    'Citfact\Core\EntityGenerator\Generator' => 'lib/EntityGenerator/Generator.php',
    'Citfact\Core\EntityGenerator\Exception\MetaDataException' => 'lib/EntityGenerator/Exception/MetaDataException.php',
    'Citfact\Core\EntityGenerator\Model\EntityTemplateTable' => 'lib/EntityGenerator/Model/EntityTemplateTable.php',
    'Citfact\Core\EntityGenerator\MetaData\TableData' => 'lib/EntityGenerator/MetaData/TableData.php',
    'Citfact\Core\EntityGenerator\MetaData\TemplateData' => 'lib/EntityGenerator/MetaData/TemplateData.php',
    'Citfact\Core\EntityGenerator\MetaData\FileData' => 'lib/EntityGenerator/MetaData/FileData.php',
    'Citfact\Core\EntityGenerator\MetaData\NativeData' => 'lib/EntityGenerator/MetaData/FileData.php',
    'Citfact\Core\EntityGenerator\MetaData\BaseData' => 'lib/EntityGenerator/MetaData/BaseData.php',
));

