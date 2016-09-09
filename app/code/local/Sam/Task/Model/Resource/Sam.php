<?php

class Sam_Task_Model_Resource_Sam extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('task/sam', 'id');
    }
}