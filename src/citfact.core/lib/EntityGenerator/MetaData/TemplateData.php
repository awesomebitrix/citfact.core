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

use Bitrix\Main\Entity;
use Citfact\Core\EntityGenerator\Model;
use Citfact\Core\EntityGenerator\Exception;

class TemplateData extends BaseData
{
    /**
     * Construct object
     *
     * @param string $fileTarget
     */
    public function __construct($templateId)
    {
        $this->initTemplateData($templateId);
    }

    /**
     * @var int $templateId
     */
    private function initTemplateData($templateId)
    {
        $queryBuilder = new Entity\Query(Model\EntityTemplateTable::getEntity());
        $queryBuilder
            ->setSelect('*')
            ->setFilter(array('ID' => $templateId))
            ->setLimit(1);

        $entityTemplate = $queryBuilder->exec()->fetch();
        if (empty($entityTemplate)) {
            throw new Exception\MetaDataException(sprintf('Not found template with ID = %d', $templateId));
        }
    }
}