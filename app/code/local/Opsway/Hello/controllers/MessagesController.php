<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 14.12.2017
 * Time: 15:57
 */
class Opsway_Hello_MessagesController extends Mage_Core_Controller_Front_Action
{
    public function goodbyeAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}