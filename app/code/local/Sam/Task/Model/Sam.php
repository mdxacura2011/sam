<?php

class Sam_Task_Model_Sam extends Mage_Core_Model_Abstract
{
    public function _construct()
{
    parent::_construct();
    $this->_init('task/sam');
}
}