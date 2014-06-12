<?php
/**
 * Created by PhpStorm.
 * User: huangzhengjia
 * Date: 14-5-20
 * Time: 下午12:17
 */

namespace KpUser\Service\Initializer;


use KpUser\Options\UserModuleOptionsAwareInterface;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserModuleOptions implements InitializerInterface
{

    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {

        if ($instance instanceof UserModuleOptionsAwareInterface) {

            $userModuleOptions = $serviceLocator->getServiceLocator()->get('UserModuleOptions');

            $instance->setUserModuleOptions($userModuleOptions);
        }


    }
} 