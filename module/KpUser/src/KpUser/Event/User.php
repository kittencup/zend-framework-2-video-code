<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-27 下午2:29
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpUser\Event;

use KpUser\Options\UserModuleOptionsAwareInterface;
use KpUser\Options\UserModuleOptions;
use Zend\EventManager\Event;
use KpUser\Entity\User as UserEntity;
use Zend\Form\FormInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class User extends Event implements UserModuleOptionsAwareInterface, ServiceLocatorAwareInterface
{

    const USER_REGISTER_PER = 'user.register.pre';

    const USER_REGISTER_POST = 'user.register.post';

    const USER_REGISTER_FAIL = 'user.register.fail';

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->setParam('serviceLocator', $serviceLocator);
        return $this;
    }

    public function getServiceLocator()
    {
        return $this->getParam('serviceLocator');
    }

    public function setUserModuleOptions(UserModuleOptions $userModuleOptions)
    {
        $this->setParam('userModuleOptions', $userModuleOptions);
        return $this;
    }

    public function getUserModuleOptions()
    {
        return $this->getParam('userModuleOptions');
    }

    public function setUserEntity(UserEntity $userEntity)
    {
        $this->setParam('userEntity', $userEntity);
        return $this;
    }

    public function getUserEntity()
    {
        return $this->getParam('userEntity');
    }

    public function setForm(FormInterface $form)
    {
        $this->setParam('form', $form);
        return $this;
    }

    public function getForm()
    {
        return $this->getParam('form');
    }
}