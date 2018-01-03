<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Kernel;

use Spryker\Shared\Config\Config;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Permission\PermissionMockFactory;
use Spryker\Shared\Kernel\Permission\PermissionFactoryInterface;
use Spryker\Shared\Kernel\Permission\PermissionInterface;

abstract class AbstractFactory
{
    use BundleConfigResolverAwareTrait;
    use BundleDependencyProviderResolverAwareTrait;
    use QueryContainerResolverAwareTrait;

    /**
     * @return PermissionInterface
     */
    public function getZedPermission()
    {
        return $this->createPermissionFactory()
            ->createZedPermission();
    }

    /**
     * @return PermissionFactoryInterface
     */
    protected function createPermissionFactory()
    {
        $permissionFactoryClass = (Config::get(KernelConstants::PERMISSION_FACTORY_CLASS, PermissionMockFactory::class));

        return new $permissionFactoryClass();
    }
}
