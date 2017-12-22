<?php

class Amasty_Subscription_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
    {

        $this->loadLayout();
        $this->getLayout()->getBlock("head")->setTitle($this->__("Subscription"));
        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
        $breadcrumbs->addCrumb("home", array(
            "label" => $this->__("Home Page"),
            "title" => $this->__("Home Page"),
            "link" => Mage::getBaseUrl()
        ));

        $breadcrumbs->addCrumb("subscription", array(
            "label" => $this->__("Subscription"),
            "title" => $this->__("Subscription")
        ));

        $this->renderLayout();

    }

    public function createNewPostAction()
    {
        $newSubs = $this->getRequest();
        $subs = Mage::getModel('subscription/ticket');
        $subs->setName($newSubs->name);
        $subs->setEmail($newSubs->email);
        $subs->setPhone($newSubs->telephone);
        $subs->setMessage($newSubs->comment);
        $subs->save();

        $this->showAllBlogPostsAction();
    }

    public function showAllBlogPostsAction()
    {
        $posts = Mage::getModel('subscription/ticket')->getCollection();
        foreach ($posts as $subs) {
            echo '<h3>' . $subs->getName() . '</h3>';
            echo nl2br($subs->getMessage());
        }
    }
}