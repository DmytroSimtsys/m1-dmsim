<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 28.12.2017
 * Time: 10:15
 */
class Amasty_Cron_Model_Observer
{
    public function crontask()
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