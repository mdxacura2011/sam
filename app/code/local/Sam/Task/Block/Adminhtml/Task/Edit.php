<?php

class Sam_Task_Block_Adminhtml_Task_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function _construct()
    {
        $this -> _blockGroup = 'task';
        $this -> _controller = 'adminhtml_task';
        $this->_mode = 'edit';

        parent::_construct();

        if (!Mage::registry('current_task')->getId()) {
            $this -> removeButton('delete');
        }
    }
    public function getHeaderText()
    {
        return Mage::helper('task')->__("Edit Price Requests");
    }
    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }
}