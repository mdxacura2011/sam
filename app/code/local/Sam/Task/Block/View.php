<?php

class Sam_Task_Block_View extends Mage_Catalog_Block_Product_View
{
    public function getPriceHtml()
    {
        $this->setTemplate('sam/view.phtml');
        return $this->toHtml();
    }

    public function getSubmitUrl()
    {

    }
}