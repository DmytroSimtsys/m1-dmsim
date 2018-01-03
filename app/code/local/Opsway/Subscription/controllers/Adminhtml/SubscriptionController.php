<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 02.01.2018
 * Time: 19:56
 */
class Opsway_Subscription_Adminhtml_SubscriptionController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('subscription');
        $this->_addContent($this->getLayout()->createBlock('subscription/adminhtml_list'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('subs_id');
        Mage::register('subs_form', Mage::getModel('subscription/ticket')->load($id));
        $blockObject = (array)Mage::getSingleton('adminhtml/session')->getBlockObject(true);
        if (count($blockObject)) {
            Mage::registry('subs_form')->setData($blockObject);
        }
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('subscription/adminhtml_subscription_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $id = $this->getRequest()->getParam('subs_id');
            $block = Mage::getModel('subscription/ticket')->load($id);
            $block
                ->setData($this->getRequest()->getParams())
                ->setCreatedAt(Mage::app()->getLocale()->date())
                ->save();

            if (!$block->getId()) {
                Mage::getSingleton('adminhtml/session')->addError('Cannot save the Message');
            }
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            Mage::getSingleton('adminhtml/session')->setBlockObject($block->getData());
            return $this->_redirect('*/*/edit', array('subs_id' => $this->getRequest()->getParam('subs_id')));
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Message was saved successfully!');

        $this->_redirect('*/*/' . $this->getRequest()->getParam('back', 'index'), array('subs_id' => $block->getId()));
    }


    public function deleteAction()
    {
        $block = Mage::getModel('subscription/ticket')
            ->setId($this->getRequest()->getParam('subs_id'))
            ->delete();
        if ($block->getId()) {
            Mage::getSingleton('adminhtml/session')->addSuccess('Message was deleted successfully!');
        }
        $this->_redirect('*/*/');

    }


    public function massStatusAction()
    {
        $statuses = $this->getRequest()->getParams();
        try {
            $blocks = Mage::getModel('subscription/ticket')
                ->getCollection()
                ->addFieldToFilter('subs_id', array('in' => $statuses['massaction']));
            foreach ($blocks as $block) {
                $block->setBlockStatus($statuses['block_status'])->save();//не понятно
            }
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            return $this->_redirect('*/*/');
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('Message were updated!');

        return $this->_redirect('*/*/');

    }

    public function massDeleteAction()
    {
        $blocks = $this->getRequest()->getParams();
        try {
            $blocks = Mage::getModel('subscription/ticket')
                ->getCollection()
                ->addFieldToFilter('subs_id', array('in' => $blocks['massaction']));
            foreach ($blocks as $block) {
                $block->delete();
            }
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            return $this->_redirect('*/*/');
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('Message were deleted!');

        return $this->_redirect('*/*/');

    }

    public function sendMessageAction()
    {

        $subs = Mage::getModel('subscription/ticket')->setId($this->getRequest()->getParam('subs_id'));
        $myCollection = $subs->getCollection();
        $myCollection->addFieldToFilter('subs_id', array(
            'eq' => $subs->getId()
        ));
        $myEntityes = $myCollection->load();
        $adminEmail = Mage::getStoreConfig('trans_email/ident_general/email');

        foreach ($myEntityes as $datas) {
            $to = $datas->email . ',' . $adminEmail;
            $message = $datas->name.'<br>'.$datas->email.'<br>'.$datas->phone.'<br>'.$datas->message;
        }

        $sended_at = time();

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $subject = "Educational project Magento <$adminEmail>";
        if (mail($to, $subject, $message, $headers)) {
            Mage::log("Success Log Message", null , "opsway_contacts.log");
            $subs->setStatus('success');
            $subs->setSendedAt($sended_at);
            //$this->IndexAction();
        } else {
            echo "Fail";
            Mage::log("Error Log Message", Zend_Log::ERR , "opsway_contacts.log");
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Message was sended!');

        return $this->_redirect('*/*/');
    }
}
