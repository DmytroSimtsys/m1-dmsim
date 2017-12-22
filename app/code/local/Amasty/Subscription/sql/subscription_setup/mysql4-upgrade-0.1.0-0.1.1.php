<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 22.12.2017
 * Time: 12:05
 */

$installer = $this;
$connection = $installer->getConnection();

$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('subs'),
        'created_at',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'nullable' => true,
            'default' => null,
            'comment' => 'Created At'
        )
    );

$installer->endSetup();