<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 22.12.2017
 * Time: 13:46
 */
$tickets = array(
    array(
        'name' => 'Vasya',
        'email' => 'v@gmail.com',
        'phone' => '222-333-222',
        'message' => 'Hello',
    ),

);

foreach ($tickets as $ticket) {
    Mage::getModel('subscription/ticket')
        ->setData($ticket)
        ->save();
}