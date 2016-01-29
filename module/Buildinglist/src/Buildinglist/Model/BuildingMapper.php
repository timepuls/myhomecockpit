<?php
namespace Buildinglist\Model;

use Zend\Db\Adapter\Adapter;
use Buildinglist\Model\BuildingEntity;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class BuildingMapper
{
    protected $tableName = 'building_item';
    protected $dbAdapter;
    protected $sql;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function fetchAll()
    {
        $select = $this->sql->select();
        $select->order(array('user ASC', 'name ASC'));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $entityPrototype = new BuildingEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }
    
    public function saveBuilding(BuildingEntity $building)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($building);
    
        if ($building->getId()) {
            // update action
            $action = $this->sql->update();
            $action->set($data);
            $action->where(array('id' => $building->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();
    
        if (!$building->getId()) {
            $building->setId($result->getGeneratedValue());
        }
        echo $building->getId();
        return $result;
    
    }
}