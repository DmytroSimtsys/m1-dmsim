<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 07.01.2018
 * Time: 12:31
 */
class Opsway_OrderedProducts_Model_Options
{
    /**
     * Provide available options as a value/label array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value'=>1, 'label'=>'Yes'),
            array('value'=>2, 'label'=>'No')
        );
    }
}