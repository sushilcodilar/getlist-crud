<?php

namespace Attribute\Extention\Plugin;

class Customer
{
    public function __construct(
        \Attribute\Extention\Api\CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepository = $customerRepository;
    }

    public function afterGetById(
        \Attribute\Extention\Api\AddressRepositoryInterface $object,
        \Attribute\Extention\Api\Data\AddressInterface $result
    ) {
        $data = $this->customerRepository->getById($result->getCustomerID());
        $extensionAttributes = $result->getExtensionAttributes();
        $extensionAttributes->setCustomer([$data]);
        $result->setExtensionAttributes($extensionAttributes);
        return $result;
    }
}
