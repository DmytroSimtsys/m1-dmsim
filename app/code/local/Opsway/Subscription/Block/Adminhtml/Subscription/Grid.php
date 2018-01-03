<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 03.01.2018
 * Time: 9:18
 */
class Opsway_Subscription_Block_Adminhtml_Subscription_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('subscriptionGrid');
        $this->setDefaultSort('subs_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('subscription/ticket')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('subs_id', array(
            'header'    => Mage::helper('subscription/data')->__('ID'),
            'align'     => 'right',
            'width'     => '50px',
            'index'     => 'subs_id',
        ));

        $this->addColumn('name', array(
            'header'    => Mage::helper('subscription/data')->__('Name'),
            'align'     => 'left',
            'index'     => 'name',
        ));

        $this->addColumn('email', array(
            'header'    => Mage::helper('subscription/data')->__('Email'),
            'align'     => 'left',
            'index'     => 'email',
        ));

        $this->addColumn('phone', array(
            'header'    => Mage::helper('subscription/data')->__('Phone'),
            'align'     => 'left',
            'index'     => 'phone',
        ));

        $this->addColumn('message', array(
            'header'    => Mage::helper('subscription/data')->__('Message'),
            'align'     => 'left',
            'index'     => 'message',
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('subscription/data')->__('Created'),
            'align'     => 'left',
            'index'     => 'created_at',
        ));

        $this->addColumn('sended_at', array(
            'header'    => Mage::helper('subscription/data')->__('Sended'),
            'align'     => 'left',
            'index'     => 'sended_at',
        ));

        $this->addColumn('status', array(
            'header'    => Mage::helper('subscription/data')->__('Status'),
            'align'     => 'left',
            'index'     => 'status',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('subs_id' => $row->getId()));
    }
}