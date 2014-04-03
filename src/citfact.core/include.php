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
));

