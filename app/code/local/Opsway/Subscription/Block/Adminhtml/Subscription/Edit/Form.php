<?php

/**
 * Created by PhpStorm.
 * User: димон
 * Date: 03.01.2018
 * Time: 11:07
 */
class Opsway_Subscription_Block_Adminhtml_Subscription_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('subs_id');
        $this->setTitle(Mage::helper('subscription/data')->__('Subscription Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('subs_form');
//        echo "<pre>";
//        var_dump($model);
//        exit();
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('subs_id' => $this->getRequest()->getParam('subs_id'))),
                'method' => 'post'
            )
        );

        $form->setHtmlIdPrefix('subs_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('subscription')->__('General Information'), 'class' => 'fieldset-wide'));

        if ($model->getSubsId()) {
            $fieldset->addField('subs_id', 'hidden', array(
                'name' => 'subs_id',
            ));
        }

        $fieldset->addField('name', 'text', array(
            'name' => 'name',
            'label' => Mage::helper('subscription')->__('Name'),
            'title' => Mage::helper('subscription')->__('Name'),
            'required' => true,
        ));

        $fieldset->addField('email', 'text', array(
            'label' => Mage::helper('subscription')->__('Email'),
            'title' => Mage::helper('subscription')->__('Email'),
            'name' => 'email',
            'required' => true,
        ));

        $fieldset->addField('phone', 'text', array(
            'label' => Mage::helper('subscription')->__('Phone'),
            'title' => Mage::helper('subscription')->__('Phone'),
            'name' => 'phone',
            'required' => true,
        ));

//        $fieldset->addField('block_status', 'select', array(
//            'label' => Mage::helper('siteblocks')->__('Status'),
//            'title' => Mage::helper('siteblocks')->__('Status'),
//            'name' => 'block_status',
//            'required' => true,
//            'options' => Mage::getModel('siteblocks/source_status')->toArray(),
//        ));

        $fieldset->addField('message', 'textarea', array(
            'name' => 'message',
            'label' => Mage::helper('subscription')->__('Message'),
            'title' => Mage::helper('subscription')->__('Message'),
            'style' => 'height:20em',
            'required' => true,

        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}