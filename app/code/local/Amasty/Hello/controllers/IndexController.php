<?php

class Amasty_Hello_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo 'Hello developer...';
    }

    public function sayAction()
    {
        echo 'Hello one more time...';
    }

    public function paramsAction()
    {
        echo '
            ';
        foreach ($this->getRequest()->getParams() as $key => $value) {
            echo '
                Param: ' . $key . '
            ';
            echo '
                Value: ' . $value . '
            ';
        }
        echo '
            ';
    }
}

?>