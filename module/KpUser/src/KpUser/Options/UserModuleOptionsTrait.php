<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-20 下午12:41
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpUser\Options;

Trait UserModuleOptionsTrait
{
    protected $userModuleOptions;

    public function setUserModuleOptions(UserModuleOptions $userModuleOptions)
    {
        $this->userModuleOptions = $userModuleOptions;
    }

    public function getUserModuleOptions()
    {
        return $this->userModuleOptions;
    }
}