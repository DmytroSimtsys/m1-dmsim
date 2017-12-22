<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 15.12.2017
 * Time: 14:52
 */
class Amasty_DBScript_Model_Ticket extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('amasty_dbscript/ticket');
    }
}