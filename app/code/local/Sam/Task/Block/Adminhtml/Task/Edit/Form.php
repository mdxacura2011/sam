<?php

class Sam_Task_Block_Adminhtml_Task_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareLayout()
    {
        $helper = Mage::helper('task');
        $model = Mage::registry('current_task');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
            'class' => 'validate-no-html-tags'
        ));
        $this->setForm($form);

        $fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('Edit Requests')));
        $fieldset->addField('name', 'text', array(
            'label' => $helper->__('Name'),
            'required' => true,
            'name' => 'name',
        ));
        $fieldset->addField('email', 'text', array(
            'label' => $helper->__('Email'),
            'required' => true,
            'name' => 'email',
        ));
        $fieldset->addField('product_sku', 'text', array(
            'label' => $helper->__('SKU'),
            'required' => true,
            'name' => 'product_sku',
        ));
        $fieldset->addField('status', 'select', array(
            'label' => $helper->__('Status'),
            'required' => true,
            'name' => 'status',
            'values' => array('New'=>'New','New, In Progress' => 'New, In Progress','Closed' => 'Closed'),

        ));
        $fieldset->addField('created_at', 'textarea', array(
            'label' => $helper->__('Comment'),
            'required' => true,
            'name' => 'created_at',
            'style' => 'width: 150px; height: 200px;',
        ));
        $form->setUseContainer(true);
        if($data = Mage::getSingleton('adminhtml/session')->getFormData())
        {
            $form->setValues($data);

        } else
        {
            $form->setValues($model->getData());
        }
        return parent::_prepareForm();
    }
}
