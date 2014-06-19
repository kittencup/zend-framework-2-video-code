<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-27 下午2:32
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpUser\Listener;

use KpUser\Event\User;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;

class UserRegister implements ListenerAggregateInterface
{

    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $events)
    {

        $this->listeners[] = $events->getSharedManager()->attach('*', User::USER_REGISTER_PER, [$this, 'checkUsername']);
        $this->listeners[] = $events->getSharedManager()->attach('*', User::USER_REGISTER_PER, [$this, 'regDate']);
        $this->listeners[] = $events->getSharedManager()->attach('*', User::USER_REGISTER_PER, [$this, 'regIp']);

    }

    public function checkUsername(EventInterface $event)
    {
        $userEntity = $event->getUserEntity();

        if ($userEntity->getUsername() === 'admin') {
            $form = $event->getForm();
            $username = $form->get('username');
            $username->setMessages(array_merge($username->getMessages(), ['username 不能为 admin']));
            return false;
        }

    }

    public function regDate(EventInterface $event)
    {
        echo __FUNCTION__, '<br>';
    }

    public function regIp(EventInterface $event)
    {
        echo __FUNCTION__, '<br>';
    }
}