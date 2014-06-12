<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-6 下午9:16
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpUser;

use KpUser\Event\User;
use KpUser\Listener\UserRegister;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface,
    AutoloaderProviderInterface,
    DependencyIndicatorInterface,
    ControllerProviderInterface,
    ServiceProviderInterface,
    BootstrapListenerInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'UserModuleOptions' => 'KpUser\Service\Factory\UserModuleOptions'
            ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'initializers' => [
                'KpUser\Service\Initializer\UserModuleOptions'
            ]
        ];
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }

    public function getModuleDependencies()
    {
        return [
            'KpBase'
        ];
    }

    public function onBootstrap(EventInterface $e)
    {
        /**
         * @var \Zend\Mvc\Application $application
         */
        $application = $e->getApplication();

        $eventManager = $application->getEventManager();
        $eventManager->attach(new UserRegister());


//        $eventManager->attach(MvcEvent::EVENT_DISPATCH,function(EventInterface $e){
//            $e->getTarget()->layout('kp-user-layout');
//        },2);

        $eventManager->getSharedManager()->attach(__NAMESPACE__, MvcEvent::EVENT_DISPATCH, function (EventInterface $e) {
            $e->getTarget()->layout('kp-user-layout');
        },2);
    }

}