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
        'status',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable' => true,
            'length' => 255,
            'default' => 'new',
            'comment' => 'Message status'
        )
    );

$installer->endSetup();