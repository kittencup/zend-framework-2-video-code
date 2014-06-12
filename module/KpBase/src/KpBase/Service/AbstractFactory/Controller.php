<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-22 下午12:12
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpBase\Service\AbstractFactory;

use Zend\Mvc\Controller\AbstractController;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Controller implements AbstractFactoryInterface
{

    protected $controllerServiceNameKey = '\Controller\\';

    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return strpos($this->controllerServiceNameKey, $requestedName) !== -1
        && class_exists($requestedName . 'Controller');
    }


    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $controllerCalss = $requestedName . 'Controller';
        $controller = new $controllerCalss;
        return $controller;
    }


}
