<?php
namespace Attribute\Extention\Model;

use Attribute\Extention\Api\CustomerRepositoryInterface;
use Attribute\Extention\Api\Data\CustomerSearchResultsInterfaceFactory as CustomerSearchResultsInterface;
use Attribute\Extention\Model\CustomerFactory as Customer;
use Attribute\Extention\Model\ResourceModel\Customer as ResourceModel;
use Attribute\Extention\Model\ResourceModel\Customer\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

class CustomerRepository implements CustomerRepositoryInterface
{

    /**
     * @var ResourceModel
     */
    private ResourceModel $ResourceModel;
    /**
     * @var Customer
     */
    private Customer $CustomerFactory;

    /**
     * @var CustomerSearchResultsInterface
     */
    private CustomerSearchResultsInterface $searchResultsFactory;

    /**
     * @var CollectionFactory
     */
    private CollectionFactory $CollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * SachinEntityRepository constructor.
     *
     * @param ResourceModel $ResourceModel
     * @param Customer $CustomerFactory
     */
    public function __construct(
        ResourceModel $ResourceModel,
        Customer $CustomerFactory,
        CustomerSearchResultsInterface $searchResultsFactory,
        CollectionFactory $CollectionFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->ResourceModel = $ResourceModel;
        $this->CustomerFactory = $CustomerFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->CollectionFactory = $CollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Get customer by Customer ID.
     *
     * @param int $customerId
     */
    public function getById($customerId)
    {
        $entity = $this->CustomerFactory->create();
        $this->ResourceModel->load($entity, $customerId);
        return $entity;
    }

    /**
     * @inheritdoc
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save($customer)
    {
        $saves = $this->CustomerFactory->create();
        $this->ResourceModel->load($saves, $customer);
//        $this->ResourceModel->save();
        return $saves;
    }

    /**
     * Delete customer by Customer ID.
     *
     */
    public function deleteById($customerId)
    {
        $entity = $this->CustomerFactory->create();
        $this->ResourceModel->load($entity, $customerId);
        return $this->ResourceModel->delete($entity);
    }

    /**
     * @inheritdoc
     */
//    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
//    {
//        $searchResults = $this->searchResultsFactory->create();
//        $searchResults->setSearchCriteria($searchCriteria);
//        $collection = $this->CollectionFactory->create();
//        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
//            foreach ($filterGroup->getFilters() as $filter) {
//                $condition = $filter->getConditionType() ?: 'eq';
//                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
//            }
//        }
//        $searchResults->setTotalCount($collection->getSize());
//        $sortOrdersData = $searchCriteria->getSortOrders();
//        if ($sortOrdersData) {
//            foreach ($sortOrdersData as $sortOrder) {
//                $collection->addOrder(
//                    $sortOrder->getField(),
//                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
//                );
//            }
//        }
//        $collection->setCurPage($searchCriteria->getCurrentPage());
//        $collection->setPageSize($searchCriteria->getPageSize());
//        $searchResults->setItems($collection->getData());
//        return $searchResults;
//    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->CollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }
}
