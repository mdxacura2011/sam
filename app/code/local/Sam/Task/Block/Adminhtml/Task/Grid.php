<?php
class Sam_Task_Block_Adminhtml_Task_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {

        $this->setId('taskGrid');

        $this->_controller = 'adminhtml_task';


        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');

        parent::_construct();
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('task/sam')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this -> addColumn('id',array(
            'header' => 'ID',
            'wight' => 50,
            'index' => 'id',
            'sortable' => false,
        ));
        $this -> addColumn('name',array(
            'header' => Mage::helper('task')->__('Name'),
            'wight' => 50,
            'index' => 'name',
            'sortable' => false,
        ));
        $this -> addColumn('email',array(
            'header' => Mage::helper('task')->__('Email'),
            'wight' => 50,
            'index' => 'email',
            'sortable' => false,
        ));
        $this -> addColumn('created_at',array(
            'header' => Mage::helper('task')->__('Comment'),
            'wight' => 50,
            'index' => 'created_at',
            'sortable' => false,
        ));
        $this -> addColumn('product_sku',array(
            'header' => 'SKU',
            'wight' => 50,
            'index' => 'product_sku',
            'sortable' => false,
        ));
        $this -> addColumn('status',array(
            'header' => Mage::helper('task')->__('Status'),
            'wight' => 50,
            'index' => 'status',
            'sortable' => false,
            'type'  => 'options',
            'options'   =>  array(
                'New' => 'New',
                'New, In Progress'  => 'New, In Progress',
                'Closed'  => 'Closed'
            )
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($task)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $task->getId(),
        ));
    }

}
