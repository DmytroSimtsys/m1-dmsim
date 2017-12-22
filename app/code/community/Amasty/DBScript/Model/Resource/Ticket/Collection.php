<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 15.12.2017
 * Time: 14:58
 */
class Amasty_DBScript_Model_Resource_Ticket_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('amasty_dbscript/ticket');
    }
}