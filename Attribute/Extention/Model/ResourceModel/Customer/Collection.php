<?php

namespace Attribute\Extention\Model\ResourceModel\Customer;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Attribute\Extention\Model\Customer', 'Attribute\Extention\Model\ResourceModel\Customer');
    }
}
