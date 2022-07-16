<?php

namespace Attribute\Extention\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for preorder Complete search results.
 * @api
 */
interface AddressSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get test Complete list.
     *
     * @return \Attribute\Extention\Api\Data\AddressInterface[]
     */
    public function getItems();

    /**
     * Set test Complete list.
     *
     * @param \Attribute\Extention\Api\Data\AddressInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
