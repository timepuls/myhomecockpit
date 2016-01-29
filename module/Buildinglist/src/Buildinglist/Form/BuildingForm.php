<?php
namespace Buildinglist\Form;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class BuildingForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('building');

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new BuildingFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'id',
            'type' => 'text',
        ));

        $this->add(array(
            'name' => 'user',
            'type' => 'text',
        ));
        
        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'id' => 'name',
                'maxlength' => 100,
            )
        ));

        $this->add(array(
            'name' => 'created',
            'type' => 'text',
        ));

        $this->add(array(
            'name' => 'updated',
            'type' => 'text',
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}