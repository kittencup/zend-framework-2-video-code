<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-27 下午12:14
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpUser\Form;

use KpUser\Entity\User;
use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class UserBase extends Form
{

    public function __construct()
    {
        parent::__construct();

        $this->setHydrator(new ClassMethods())->setObject(new User());

        $this->add([
            'type' => 'text',
            'name' => 'username',
            'options' => [
                'label' => 'username'
            ]
        ], [
            'priority' => 99
        ]);

        $this->add([
            'type' => 'password',
            'name' => 'password',
            'options' => [
                'label' => 'password'
            ]
        ], [
            'priority' => 98
        ]);

        $this->add([
            'type' => 'email',
            'name' => 'email',
            'options' => [
                'label' => 'email'
            ]
        ], [
            'priority' => 97
        ]);

    }

}