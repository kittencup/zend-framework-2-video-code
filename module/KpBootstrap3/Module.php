<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-6-12 下午2:08
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpBootstrap3;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements AutoloaderProviderInterface,ViewHelperProviderInterface{

    public function getViewHelperConfig(){
        return [
            'invokables'=>[
                'KpBootstrap3Form'=>'KpBootstrap3\Form\View\Helper\Bootstrap3Form',
                'KpBootstrap3FormRow'=>'KpBootstrap3\Form\View\Helper\Bootstrap3FormRow',
                'KpBootstrap3FormElementErrors'=>'KpBootstrap3\Form\View\Helper\Bootstrap3FormElementErrors'
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

}