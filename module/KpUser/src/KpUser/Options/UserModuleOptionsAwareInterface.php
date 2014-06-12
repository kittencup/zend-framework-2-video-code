<?php
/**
 * Created by PhpStorm.
 * User: huangzhengjia
 * Date: 14-5-20
 * Time: 下午12:20
 */

namespace KpUser\Options;


Interface UserModuleOptionsAwareInterface
{
    public function setUserModuleOptions(UserModuleOptions $userModuleOptions);

    public function getUserModuleOptions();
} 