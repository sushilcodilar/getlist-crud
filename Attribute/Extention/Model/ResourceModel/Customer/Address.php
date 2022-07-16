<?php

namespace Attribute\Extention\Model\ResourceModel\Customer;

class Address extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Attribute\Extention\Model\Address', 'Attribute\Extention\Model\ResourceModel\Address');
    }
}
