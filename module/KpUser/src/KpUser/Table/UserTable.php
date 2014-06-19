<?php
/**
 * Created by PhpStorm.
 * User: huangzhengjia
 * Date: 14-6-19
 * Time: 下午1:56
 */

namespace KpUser\Table;


use KpUser\Entity\User;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;


class UserTable extends AbstractTableGateway implements AdapterAwareInterface
{

    protected $table = 'kp_user_zf2mvc';

    protected $adapter;

    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;

        $this->resultSetPrototype = new HydratingResultSet(new ClassMethods(), new User());

        $this->initialize();
    }

} 