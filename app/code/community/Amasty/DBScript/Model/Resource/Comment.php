<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 15.12.2017
 * Time: 14:57
 */
class Amasty_DBScript_Model_Resource_Comment extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('amasty_dbscript/comment', 'comment_id');
    }
}