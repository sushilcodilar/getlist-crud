<?php
namespace Attribute\Extention\Model;

use Attribute\Extention\Api\AddressRepositoryInterface;
use Attribute\Extention\Api\Data\AddressInterface;
use Attribute\Extention\Api\Data\AddressSearchResultsInterface;
use Attribute\Extention\Api\Data\AddressSearchResultsInterfaceFactory;
use Attribute\Extention\Model\AddressFactory as Address;
use Attribute\Extention\Model\ResourceModel\Address as ResourceModel;
use Attribute\Extention\Model\ResourceModel\Customer\AddressFactory as AddressCollectionFactory;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResults as SearchResultsFactory;

class AddressRepository implements AddressRepositoryInterface
{

    /**
     * @var ResourceModel
     */
    private ResourceModel $ResourceModel;
    /**
     * @var Address
     */
    private Address $AddressFactory;

    /**
     * @var AddressCollectionFactory
     */
    protected AddressCollectionFactory $addressCollectionFactory;

    /**
     * @var SearchResultsFactory
     */
    private SearchResultsFactory $SearchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var AddressSearchResultsInterfaceFactory
     */
    protected AddressSearchResultsInterfaceFactory $AddressSearchResultsInterfaceFactory;

    /**
     * @var FilterBuilder
     */
    private FilterBuilder $filterBuilder;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     *
     * @param ResourceModel $ResourceModel
     * @param Address $AddressFactory
     * @param AddressCollectionFactory $addressCollectionFactory
     * @param SearchResultsFactory $SearchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param AddressSearchResultsInterfaceFactory $AddressSearchResultsInterfaceFactory
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ResourceModel $ResourceModel,
        Address $AddressFactory,
        AddressCollectionFactory $addressCollectionFactory,
        SearchResultsFactory $SearchResultsFactory,
        CollectionProcessorInterface $collectionProcessor,
        AddressSearchResultsInterfaceFactory $AddressSearchResultsInterfaceFactory,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->ResourceModel = $ResourceModel;
        $this->AddressFactory = $AddressFactory;
        $this->addressCollectionFactory = $addressCollectionFactory;
        $this->SearchResultsFactory = $SearchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->filterBuilder = $filterBuilder;
        $this->AddressSearchResultsInterfaceFactory = $AddressSearchResultsInterfaceFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Retrieve customer address.
     *
     * @param int $addressId
     * @return AddressInterface
     */
    public function getById($addressId)
    {
        $entity = $this->AddressFactory->create();
        $this->ResourceModel->load($entity, $addressId);
        return $entity;


//        $filter = $this->filterBuilder->setField('customer_id')
//            ->setConditionType('eq')
//            ->setValue($addressId)
//            ->create();
//        $searchCriteria = $this->searchCriteriaBuilder->addFilters([$filter])->create();
//        return $this->getList($searchCriteria)->getItems();
    }

    /**
     * Delete customer address by ID.
     *
     * @param int $addressId
     * @return bool true on success
     * @throws \Exception
     */
    public function deleteById($addressId): bool
    {
        $entity = $this->AddressFactory->create();
        $this->ResourceModel->load($entity, $addressId);
        return $this->ResourceModel->delete($entity);
    }

    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return AddressInterface[]
     */
    public function getAddressData($entityId)
    {
        $filter = $this->filterBuilder->setField('customer_id')
            ->setConditionType('eq')
            ->setValue($entityId)
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder->addFilters([$filter])->create();
        return $this->getList($searchCriteria)->getItems();

    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return AddressSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {

        $collection = $this->addressCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResult = $this->AddressSearchResultsInterfaceFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

}
