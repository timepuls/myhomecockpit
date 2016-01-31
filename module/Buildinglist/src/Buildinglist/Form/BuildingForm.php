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
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'user',
            'type' => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'User',
            ),
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
            'options' => array(
                'label' => 'Created',
            ),
            'attributes' => array(
                'id' => 'name',
                'maxlength' => 19,
            ) 
        ));

        $this->add(array(
            'name' => 'updated',
            'type' => 'text',
            'options' => array(
                'label' => 'Updated',
            ),
            'attributes' => array(
                'id' => 'name',
                'maxlength' => 19,
            )
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