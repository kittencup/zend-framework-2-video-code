<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-27 下午12:31
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpUser\Form;

class UserRegister extends UserBase
{
    public function __construct()
    {
        parent::__construct();

        $this->add([
            'type' => 'password',
            'name' => 'passwordConfirm',
            'options' => [
                'label' => 'password confirm'
            ]
        ],[
            'priority'=>98
        ]);


        $this->add([
            'type'=>'submit',
            'name'=>'submit',
            'attributes'=>[
                'value'=>'register'
            ]
        ]);

    }
}