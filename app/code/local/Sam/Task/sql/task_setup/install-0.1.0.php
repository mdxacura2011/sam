<?php
$installer = $this;
$table2 = $installer->getTable('task/sam');
$installer -> startSetup();
$table = $installer->getConnection()
    ->newTable($table2)
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'=>true,
        'autoinc'=>true,
        'nullable'=>false,
        'primary'=>true
    ))
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable'=>false
    ))
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable'=>false
    ))
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable'=>false
    ))
    ->addColumn('product_sku', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable'=>false
    ))
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable'=>false,
        'unsigned'  => true,
        'default'   => 'new'

    ));
$installer->getConnection()->createTable($table);
$installer->endSetup();