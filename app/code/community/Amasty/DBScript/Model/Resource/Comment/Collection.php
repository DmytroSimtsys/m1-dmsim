<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 15.12.2017
 * Time: 14:59
 */
class Amasty_DBScript_Model_Resource_Comment_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_dbscript/comment');
    }
}