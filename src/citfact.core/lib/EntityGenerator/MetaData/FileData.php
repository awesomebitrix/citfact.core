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

use Citfact\Core\EntityGenerator\Exception;

class FileData extends BaseData
{
    /**
     * Construct object
     *
     * @param string $fileTarget
     */
    public function __construct($fileTarget)
    {
        $this->initFileData($fileTarget);
    }

    /**
     * @param string $fileTarget
     * @throws \Citfact\Core\EntityGenerator\Exception\MetaDataException
     */
    private function initFileData($fileTarget)
    {
        if (!file_exists($fileTarget)) {
            throw new Exception\MetaDataException(sprintf('Not exists file "%s"', $fileTarget));
        }
    }
}