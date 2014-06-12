<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-27 下午12:31
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpUser\Form;

class UserLogin extends UserBase
{
    public function __construct()
    {
        parent::__construct();

        $this->remove('email');

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'login'
            ]
        ]);


    }
}