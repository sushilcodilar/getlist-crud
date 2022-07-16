<?php
namespace Attribute\Extention\Controller\Index;

use Attribute\Extention\Api\CustomerRepositoryInterface;
use Attribute\Extention\Model\CustomerRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Display extends Action
{
    protected Context $context;

    protected pageFactory $pageFactory;

    protected SearchCriteriaBuilder $SearchCriteriaBuilder;

    protected CustomerRepository $CustomerRepository;

    /**
     * @var CustomerRepositoryInterface
     */
    private CustomerRepositoryInterface $CustomerRepositoryInterface;

    public function __construct(
        Context $context,
        pageFactory $pageFactory,
        SearchCriteriaBuilder $SearchCriteriaBuilder,
        CustomerRepository $CustomerRepository,
        CustomerRepositoryInterface $CustomerRepositoryInterface
    ) {
        $this->pageFactory = $pageFactory;
        $this->SearchCriteriaBuilder = $SearchCriteriaBuilder;
        $this->CustomerRepository = $CustomerRepository;
        $this->CustomerRepositoryInterface = $CustomerRepositoryInterface;
        return parent::__construct($context);
    }

    public function execute()
    {
//        $search = $this->SearchCriteriaBuilder->create();
        ////        $customer = $this->CustomerRepository->getList($search)->getItems();
//
//        $customer = $this->CustomerRepositoryInterface->getList($search)->getItems();
//
//        foreach ($customer as $item) {
//            echo "<br>";
//            print_r($item->getEmail());
//        }
//        exit();
        return $this->pageFactory->create();
    }
}
