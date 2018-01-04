<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 04.01.2018
 * Time: 14:20
 */
require_once("Mage/Catalog/controllers/ProductController.php");

class Opsway_OrderedProducts_IndexController extends Mage_Catalog_ProductController
{
    public function viewAction()
    {
        echo "jdfbvjhdbvjh";

//        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
//
//        }
//        else{
//            $collection = Mage::getModel('catalog/product')->getCollection();
//            $collection->setOrder('rand()');
//            $collection->setPageSize(2);
//            var_dump((string)$collection->getData());
//            echo "kshdbvhbchj";
//        }
//        $this->loadLayout();
//        $this->renderLayout();

    }

}