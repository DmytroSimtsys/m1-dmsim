<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 02.01.2018
 * Time: 19:56
 */
class Amasty_Subscription_Adminhtml_SubscriptionController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('subscription');
        $this->_addContent($this->getLayout()->createBlock('subscription/adminhtml_list'));
        $this->renderLayout();
    }
}
