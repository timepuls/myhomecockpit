<?php
namespace Buildinglist\Model;

class BuildingEntity
{
    protected $id;
    protected $user;
    protected $name;
    protected $created;
    protected $updated;

    public function __construct()
    {
        $this->created = date('Y-m-d H:i:s');
        $this->created->setTimeZone(new DateTimeZone('Switzerland/Zurich'));
        $this->updated = date('Y-m-d H:i:s'); //date_create("2013-06-30 07:00:01");
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($Value)
    {
        $this->id = $Value;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($Value)
    {
        $this->user = $Value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($Value)
    {
        $this->name = $Value;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($Value)
    {
        $this->created = $Value;
    }
    
    public function getUpdated()
    {
        return $this->updated;
    }
    
    public function setUpdated($Value)
    {
        $this->updated = $Value;
    }
}