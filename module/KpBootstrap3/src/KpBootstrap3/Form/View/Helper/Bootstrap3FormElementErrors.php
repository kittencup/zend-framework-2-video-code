<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-6-12 下午2:10
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpBootstrap3\Form\View\Helper;

use Zend\Form\View\Helper\FormElementErrors;

class Bootstrap3FormElementErrors extends FormElementErrors{

    protected $messageCloseString     = '</p>';
    protected $messageOpenFormat      = '<p class="help-block">';
    protected $messageSeparatorString = ',';

}