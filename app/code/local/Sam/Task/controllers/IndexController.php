<?php

class Sam_Task_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveformAction()
    {
        $postData = $this->getRequest()->getPost();
        if ($postData) {

            $postData = Mage::helper('task')->validate($postData);

            $request_price = Mage::getModel('task/sam');

            $request_price->setData($postData);
            $request_price->save();
        }

    }
}

