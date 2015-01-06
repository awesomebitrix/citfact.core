<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;

interface ContainerLoaderInterface
{
    /**
     * Initializes the service container.
     */
    public function initializeContainer();

    /**
     * Gets the current container.
     *
     * @return ContainerBuilder
     */
    public function getContainer();
}