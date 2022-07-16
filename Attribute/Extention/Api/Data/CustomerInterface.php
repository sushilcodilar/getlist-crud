<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Attribute\Extention\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Customer entity interface for API handling.
 *
 * @api
 * @since 100.0.2
 */
interface CustomerInterface extends ExtensibleDataInterface
{
    public const ID = 'entity_id';
    public const EMAIL = 'email';
    public const FIRSTNAME = 'firstname';
    public const LASTNAME = 'lastname';
    /**
     * Get customer id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get email address
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set email address
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstname();

    /**
     * Set first name
     *
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname);

    /**
     * Get last name
     *
     * @return string
     */
    public function getLastname();

    /**
     * Set last name
     *
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Attribute\Extention\Api\Data\CustomerExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Attribute\Extention\Api\Data\CustomerExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Attribute\Extention\Api\Data\CustomerExtensionInterface $extensionAttributes);
}
