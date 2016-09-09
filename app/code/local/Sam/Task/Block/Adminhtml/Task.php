<?php

class Sam_Task_Block_Adminhtml_Task extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'task';
        $this->_controller = 'adminhtml_task';
        $this->_headerText = Mage::helper('task')->__('Price Requests');

        parent::_construct();
        $this->removeButton('add');
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }
}