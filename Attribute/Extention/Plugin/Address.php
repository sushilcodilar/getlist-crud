<?php

namespace Attribute\Extention\Plugin;

class Address
{
    public function __construct(
        \Attribute\Extention\Api\AddressRepositoryInterface $addressRepository
    ) {
        $this->addressRepository = $addressRepository;
    }

    public function afterGetById(
        \Attribute\Extention\Api\CustomerRepositoryInterface $object,
        \Attribute\Extention\Api\Data\CustomerInterface $result
    ) {
        $data = $this->addressRepository->getAddressData($result->getId());
        $extensionAttributes = $result->getExtensionAttributes();
        $extensionAttributes->setAddress([$data]);
        $result->setExtensionAttributes($extensionAttributes);
        return $result;
    }
}
