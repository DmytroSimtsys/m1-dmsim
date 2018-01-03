<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 03.01.2018
 * Time: 9:42
 */
class Amasty_Subscription_Block_Adminhtml_List extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_subscription';
        $this->_blockGroup = 'subscription';
        $this->_headerText = Mage::helper('subscription/data')->__('Subscription Manager');
        $this->_addButtonLabel = Mage::helper('subscription/data')->__('Add Subs');
        parent::__construct();
    }

}