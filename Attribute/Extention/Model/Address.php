<?php

namespace Attribute\Extention\Model;

use Attribute\Extention\Api\Data\AddressInterface;
use Attribute\Extention\Model\ResourceModel\Address as ResourceModel;
use Magento\Framework\Model\AbstractExtensibleModel;
use Magento\Framework\Api\ExtensionAttributesInterface;

class Address extends AbstractExtensibleModel implements AddressInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
    /**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }
    /**
     * Get street
     *
     * @return string[]
     */
    public function getStreet()
    {
        return $this->getData(self::STREET);
    }

    /**
     * Set street
     *
     * @param string[] $street
     * @return $this
     */
    public function setStreet(array $street)
    {
        return $this->setData(self::STREET, $street);
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->getData(self::COMPANY);
    }

    /**
     * Set company
     *
     * @param string $company
     * @return $this
     */
    public function setCompany($company)
    {
        return $this->setData(self::COMPANY, $company);
    }

    /**
     * Get telephone number
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->getData(self::TELEPHONE);
    }

    /**
     * Set telephone number
     *
     * @param string $telephone
     * @return $this
     */
    public function setTelephone($telephone)
    {
        return $this->setData(self::TELEPHONE, $telephone);
    }
    /**
     * Get city name
     *
     * @return string
     */
    public function getCity()
    {
        return $this->getData(self::CITY);
    }

    /**
     * Set city name
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get CUSID
     *
     * @return int
     */

    public function getCustomerID()
    {
        return $this->getData(self::CUSID);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return ExtensionAttributesInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     *
     * @param \Attribute\Extention\Api\Data\AddressExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Attribute\Extention\Api\Data\AddressExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
