<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-14 下午6:08
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class UserCenterController extends AbstractActionController{

    public function indexAction(){
        echo 'user center index';
        exit;
    }
}