<?php

namespace Attribute\Extention\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CustomerSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get test Complete list.
     *
     * @return \Attribute\Extention\Api\Data\CustomerInterface[]
     */
    public function getItems();

    /**
     * Set test Complete list.
     *
     * @param \Webkul\Hello\Api\Data\CustomerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
