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
        'sended_at',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable' => true,
            'length' => 255,
            'comment' => 'Mail date send'
        )
    );

$installer->endSetup();