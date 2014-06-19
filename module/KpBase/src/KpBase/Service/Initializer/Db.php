<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-6-19 下午2:09
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpBase\Service\Initializer;

use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Db implements InitializerInterface
{

    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
            if($instance instanceof AdapterAwareInterface){
                $instance->setDbAdapter($serviceLocator->get('Zend\Db\Adapter\Adapter'));
            }
    }
}