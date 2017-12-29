<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 28.12.2017
 * Time: 9:38
 */
$tickets = Mage::getModel('subscription/ticket')
    ->getCollection();

foreach ($tickets as $ticket) {
    $ticket->setSendedAt(strftime('%Y-%m-%d %H:%M:%S', time()))
        ->save();
}