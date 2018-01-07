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

            $customer = Mage::getSingleton('customer/session')->getCustomer();
            $user = $customer->getEntityId();



            $orders= Mage::getModel('sales/order')
                ->getCollection()
                ->addAttributeToFilter('customer_id',Mage::getSingleton('customer/session')
                    ->getCustomer()
                    ->getId());
            foreach($orders as $eachOrder){
                $order = Mage::getModel("sales/order")->load($eachOrder->getId());

                $items = $order->getAllVisibleItems();

               return $items;
            }

        } else {

            $this->_productCollection;
            $collection = Mage::getResourceModel('catalog/product_collection');
            Mage::getModel('catalog/layer')->prepareProductCollection($collection);
            $collection->getSelect()->limit(5)->order('rand()');

            $this->_productCollection = $collection;

            return $this->_productCollection;
        }

    }


}