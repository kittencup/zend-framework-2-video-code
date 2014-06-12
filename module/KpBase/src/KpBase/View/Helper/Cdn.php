<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-6-12 下午1:14
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpBase\View\Helper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\View\Helper\AbstractHelper;

class Cdn extends AbstractHelper implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    protected static $defaultType = 'kittencup';

    protected $types = [
        'kittencup' => 'http://cdn2.kittencup.com',
        'qiniu' => 'http://cdn.qiniu.com/kittencup'
    ];

    public function __invoke($type = null)
    {
        if ($type !== null) {
            if (array_key_exists($type, $this->types)) {
                return $this->types[$type];
            }
        }

        $serviceManager = $this->serviceLocator->getServiceLocator();

        $config = $serviceManager->get('Config');

        if (isset($config['view_manager']) && isset($config['view_manager']['base_path'])) {
            return $config['view_manager']['base_path'];
        }

        return $this->types[static::$defaultType];
    }
}