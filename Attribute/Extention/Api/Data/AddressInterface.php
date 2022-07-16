<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Attribute\Extention\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Customer address interface.
 * @api
 * @since 100.0.2
 */
interface AddressInterface extends ExtensibleDataInterface
{

    const ID = 'entity_id';
    const STREET = 'street';
    const COMPANY = 'company';
    const TELEPHONE = 'telephone';
    const CITY = 'city';
    const CUSID = 'customer_id';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();
    /**
     * Get street
     *
     * @return string[]
     */
    public function getStreet();

    /**
     * Get ID
     *
     * @return int
     */
    public function getCustomerID();

    /**
     * Set street
     *
     * @param string[] $street
     * @return $this
     */
    public function setStreet(array $street);

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany();

    /**
     * Set company
     *
     * @param string $company
     * @return $this
     */
    public function setCompany($company);

    /**
     * Get telephone number
     *
     * @return string
     */
    public function getTelephone();

    /**
     * Set telephone number
     *
     * @param string $telephone
     * @return $this
     */
    public function setTelephone($telephone);
    /**
     * Get city name
     *
     * @return string
     */
    public function getCity();

    /**
     * Set city name
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Attribute\Extention\Api\Data\AddressExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Attribute\Extention\Api\Data\AddressExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Attribute\Extention\Api\Data\AddressExtensionInterface $extensionAttributes);
}
