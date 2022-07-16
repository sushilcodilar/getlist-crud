<?php
namespace Attribute\Extention\Model\ResourceModel;

class Address extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('customer_address', 'entity_id');
    }
}
