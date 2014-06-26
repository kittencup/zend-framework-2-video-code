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
use Zend\Mvc\MvcEvent;
use Zend\Paginator\Paginator as ZendPaginator;
use Zend\View\Helper\PaginationControl;

class Paginator implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $events)
    {

        $this->listeners[] = $events->getSharedManager()->attach('*', MvcEvent::EVENT_DISPATCH, [$this, 'setPaginator']);

    }

    public function setPaginator(EventInterface $event)
    {

        ZendPaginator::setDefaultItemCountPerPage(1);

        PaginationControl::setDefaultScrollingStyle('all');

        PaginationControl::setDefaultViewPartial('kp-user-pagination');


    }

}