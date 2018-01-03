<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 03.01.2018
 * Time: 11:04
 */
class Opsway_Subscription_Block_Adminhtml_Subscription_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'subs_id';
        $this->_controller = 'adminhtml_subscription';
        $this->_blockGroup = 'subscription';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('subscription')->__('Save Message'));
        $this->_updateButton('delete', 'label', Mage::helper('subscription')->__('Delete Message'));

        $id = Mage::registry('subs_form')->getId();
        $addUrl = $this->getUrl("*/*/sendMessage", array('subs_id'=>$id));
        $this->_addButton('send', array(
            'label'     => Mage::helper('subscription')->__('Send Message'),
            'onclick'   => 'setLocation(\'' . $addUrl . '\')',
            'class'     => 'back'), 3, 1);

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('subscription')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), 1,1);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";


    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('subs_form')->getId()) {
            return Mage::helper('subscription')->__("Edit Message '%s'", $this->escapeHtml(Mage::registry('subs_form')->getTitle()));
        }
        else {
            return Mage::helper('subscription')->__('New Message');
        }
    }


}