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
        date_default_timezone_set('Europe/Zurich');
        $this->created = date('Y-m-d H:i:s');
        $this->updated = date('Y-m-d H:i:s');
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
    
    public function setUpdated()
    {
        date_default_timezone_set('Europe/Zurich');
        $this->updated = date('Y-m-d H:i:s');
    }
}