<?php

class Sam_Task_Adminhtml_TaskController extends Mage_Adminhtml_Controller_Action
{
    protected function _initSam()
    {
        $helper = Mage::helper('task');
        $this->_title($helper->__('Sam'))->_title($helper->__('task'));
        Mage::register('current_task', Mage::getModel('task/sam'));
        $samId = $this->getRequest()->getParam('id');
        if (!is_null($samId)) {
            Mage::registry('current_task')->load($samId);
        }
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('task');
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }
    public function editAction()
    {
        $this->_initSam();
        $this->loadLayout();
        $this->_setActiveMenu('task');
        $this->renderLayout();
    }
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('task/sam');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                $user = Mage::getSingleton('admin/session');
                $userid = $user->getUser()->getUserId();
                $model -> setUserId($userid);
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Data saved successfully!'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }
    public function deleteAction()
    {

        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('task/sam')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Successfully deleted!'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }
}