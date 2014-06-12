<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-20 上午11:00
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpUser\Options;

use Zend\Stdlib\AbstractOptions;

class UserModuleOptions extends AbstractOptions
{

    const CONFIG_KEY = 'kp_user';

    protected $disabledRegister;

    protected $disabledLogin;

    /**
     * @param mixed $disabledLogin
     */
    public function setDisabledLogin($disabledLogin)
    {
        $this->disabledLogin = $disabledLogin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisabledLogin()
    {
        return $this->disabledLogin;
    }

    /**
     * @param mixed $disabledRegister
     */
    public function setDisabledRegister($disabledRegister)
    {
        $this->disabledRegister = $disabledRegister;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisabledRegister()
    {
        return $this->disabledRegister;
    }


}