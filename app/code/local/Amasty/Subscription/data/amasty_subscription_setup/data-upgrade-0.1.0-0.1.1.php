<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 22.12.2017
 * Time: 13:25
 */
$tickets = Mage::getModel('subscription/ticket')
    ->getCollection();

foreach ($tickets as $ticket) {
    $ticket->setCreatedAt(strftime('%Y-%m-%d %H:%M:%S', time()))
        ->save();
}