<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 04.01.2018
 * Time: 21:10
 */
class Opsway_OrderedProducts_Block_Index extends Mage_Core_Block_Template
{

    public function Proba()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {

            $orders = Mage::getModel('sales/order')
                ->getCollection()
                ->addAttributeToFilter('customer_id', Mage::getSingleton('customer/session')
                    ->getCustomer()
                    ->getId());
            foreach ($orders as $eachOrder) {
                $order = Mage::getModel("sales/order")->load($eachOrder->getId());

                $items = $order->getAllVisibleItems();


                return $items;
            }

        } else {

            $this->_productCollection;
            $collection = Mage::getResourceModel('catalog/product_collection');
            Mage::getModel('catalog/layer')->prepareProductCollection($collection);
            $collection->getSelect()->limit(5)->order('rand()');


//            $cache = Mage::app()->getCache();
//            $collection = $cache->load('our_data');
//
//            if(!$collection) {
//                $collection = Mage::getResourceModel('catalog/product_collection');
//                Mage::getModel('catalog/layer')->prepareProductCollection($collection);
//                $collection->getSelect()->limit(5)->order('rand()');
//
//                $cache->save( json_encode($collection),'our_data',array(Mage_Core_Model_Resource_Db_Collection_Abstract::CACHE_TAG),60);
//            } else {
//                $collection =  json_decode($collection);
//            }

            $this->_productCollection = $collection;


            return $this->_productCollection;
        }

    }

    protected function _toHtml()
    {
        //echo Mage::getStoreConfig('opsway_orderedproducts/groups/general/cache_products')."jhbcjsdbcjsbdh";
       // if (Mage::getStoreConfig('opsway_orderedproducts/groups/general/cache_products')=="checked") {
            if (Mage::getSingleton('customer/session')->isLoggedIn()) {

                return parent::_toHtml();

            } else {

                $cache = Mage::app()->getCache();

                $html = $cache->load('our_data');

                if (!$html) {
                    $html = parent::_toHtml();
                    $cache->save($html, 'our_data', array('blocks_cache'), 60);
                }

                return $html;
            }

//        } else {
//            return parent::_toHtml();
//        }

    }
}