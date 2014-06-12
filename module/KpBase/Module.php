<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-14 下午5:56
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpBase;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements AutoloaderProviderInterface,
    ControllerProviderInterface,ViewHelperProviderInterface
{
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

    public function getControllerConfig()
    {
        return [
            'abstract_factories' => [
                'KpBase\Service\AbstractFactory\Controller'
            ]
        ];
    }

    public function getViewHelperConfig(){
        return [
            'invokables'=>[
                'Cdn'=>'KpBase\View\Helper\Cdn'
            ]
        ];
    }


}