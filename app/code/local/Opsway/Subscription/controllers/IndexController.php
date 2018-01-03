<?php

class Opsway_Subscription_IndexController extends Mage_Core_Controller_Front_Action
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
        $created_at = time();
        $subs->setCreated_at($created_at);
        $subs->save();


    }

    public function cronMail()
    {
        $adminEmail = Mage::getStoreConfig('trans_email/ident_general/email');
        $subs = Mage::getModel('subscription/ticket');
        $myCollection = $subs->getCollection();
        $myCollection->addFieldToFilter('status',array(
            'eq' =>  'new'
        ));
        $myEntityes = $myCollection->load();

        foreach($myEntityes as $datas){
            $to = $datas->email.','.$adminEmail;
            $message = $datas->name.'<br>'.$datas->email.'<br>'.$datas->phone.'<br>'.$datas->message;

            $sended_at = time();

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $subject = "Educational project Magento <$adminEmail>";
            if (mail($to, $subject, $message, $headers)) {
                Mage::log("Success Log Message", null , "opsway_contacts.log");
                $subs->setStatus('success');
                $subs->setSendedAt($sended_at);
                $this->IndexAction();
            } else {
                echo "Fail";
                Mage::log("Error Log Message", Zend_Log::ERR , "opsway_contacts.log");
            }
        }


    }
}