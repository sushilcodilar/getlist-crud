<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Attribute\Extention\Api;

/**
 * Customer CRUD interface.
 * @api
 * @since 100.0.2
 */
interface CustomerRepositoryInterface
{
    /**
     * Get customer by Customer ID.
     *
     * @param int $customerId
     * @return \Attribute\Extention\Api\Data\CustomerInterface
     */
    public function getById($customerId);

    /**
     * Delete customer by Customer ID.
     * @return \Attribute\Extention\Api\Data\CustomerInterface
     */
    public function deleteById($customerId);


    /**
     * @param $customer
     * @return \Attribute\Extention\Api\Data\CustomerInterface
     */
    public function save($customer);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Attribute\Extention\Api\Data\CustomerSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

}
