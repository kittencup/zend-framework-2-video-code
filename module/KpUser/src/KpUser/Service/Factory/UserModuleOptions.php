<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-20 上午11:12
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpUser\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use KpUser\Options\UserModuleOptions as UserModuleOptionsOptions;

class UserModuleOptions implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        $userConfig = isset($config[UserModuleOptionsOptions::CONFIG_KEY]) ? $config[UserModuleOptionsOptions::CONFIG_KEY] : [];
        return new UserModuleOptionsOptions($userConfig);
    }

}