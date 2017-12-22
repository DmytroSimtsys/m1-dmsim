<?php
class Amasty_Subscription_Model_Mysql4_Ticket extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("subscription/ticket", "subs_id");
    }
}