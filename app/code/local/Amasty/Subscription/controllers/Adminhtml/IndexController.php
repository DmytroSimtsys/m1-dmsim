<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 02.01.2018
 * Time: 19:56
 */
class Amasty_Subscription_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}