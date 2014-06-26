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
use Zend\Db\Adapter\Exception\InvalidQueryException;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\Feature\EventFeature;
use Zend\Db\TableGateway\Feature\FeatureSet;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManager;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Stdlib\Hydrator\ClassMethods;


class UserTable extends AbstractTableGateway implements AdapterAwareInterface
{

    protected $table = 'kp_user_zf2mvc';

    protected $adapter;

    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;

        $this->resultSetPrototype = new HydratingResultSet(new ClassMethods(), new User());

        if (!$this->featureSet instanceof FeatureSet) {
            $this->featureSet = new FeatureSet;
        }


        $eventManager = new EventManager();
        $eventManager->attach(['preSelect', 'preUpdate', 'preDelete', 'preInsert'], function (EventInterface $event) {

            $sqlKey = strtolower(str_replace('pre', '', $event->getName()));

            echo $event->getParam($sqlKey)->getSqlString($event->getTarget()->getAdapter()->getPlatform()), '<br>';
        });

        $this->featureSet->addFeature(new EventFeature($eventManager));


        $this->initialize();


    }

    public function saveUser(User $user)
    {

        $id = (int)$user->getId();

        $saveData = $this->resultSetPrototype->getHydrator()->extract($user);

        $saveData = array_filter($saveData, function ($item) {
            return $item !== null;
        });

        if ($id) {

        } else {
            $this->insert($saveData);
            return $this->lastInsertValue;
        }

    }

    public function fetchUserPaginator()
    {

        $select = $this->sql->select();
        $dbSelect = new DbSelect($select, $this->adapter, $this->resultSetPrototype);
        return new Paginator($dbSelect);

    }

}