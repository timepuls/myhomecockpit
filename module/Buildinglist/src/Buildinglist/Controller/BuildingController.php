<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Buildinglist for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Buildinglist\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Buildinglist\Model\BuildingEntity;
use Buildinglist\Form\BuildingForm;

class BuildingController extends AbstractActionController
{
    public function indexAction()
    {
        $mapper = $this->getBuildingMapper();
        return new ViewModel(array('buildings' => $mapper->fetchAll()));
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /building/building/foo
        return array();
    }
    
    public function getBuildingMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('BuildingMapper');
    }
    
    public function addAction()
    {
        $form = new BuildingForm();
        $building = new BuildingEntity();
        $form->bind($building);
    
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getBuildingMapper()->saveBuilding($building);
    
                // Redirect to list of buildings
                return $this->redirect()->toRoute('building');
            }
        }
        return array('form' => $form);
    }
    
    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('building', array('action'=>'add'));
        }
        $building = $this->getBuildingMapper()->getBuilding($id);
        
        $form = new BuildingForm();
        $form->bind($building);
    
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getBuildingMapper()->saveBuilding($building);
    
                // Redirect to list of buildings
                return $this->redirect()->toRoute('building');
            }
        }
        return array('id' => $id, 'building' => $building, 'form' => $form);
    }
    
    public function deleteAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('building');
        }
        $building = $this->getBuildingMapper()->getBuilding($id);       
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Yes') {
                $this->getBuildingMapper()->deleteBuilding($id);
            }
                // Redirect to list of buildings
            return $this->redirect()->toRoute('building');
        }
        return array('id' => $id, 'building' => $building);
    }
    
}
