<?php
namespace Attribute\Extention\Block;

use Attribute\Extention\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;

class Display extends Template
{
    /**
     * @var PageFactory
     */
    private PageFactory $_pageFactory;

    /**
     * @var Context
     */
    private Context $context;

    /**
     * @var CustomerRepositoryInterface
     */
    private CustomerRepositoryInterface $CustomerRepositoryInterface;

    /**
     * @var SearchCriteriaBuilder
     */
    protected SearchCriteriaBuilder $SearchCriteriaBuilder;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        CustomerRepositoryInterface $CustomerRepositoryInterface,
        SearchCriteriaBuilder $SearchCriteriaBuilder,
        array $data = []
    ) {
        $this->pageFactory = $pageFactory;
        $this->SearchCriteriaBuilder = $SearchCriteriaBuilder;
        $this->CustomerRepositoryInterface = $CustomerRepositoryInterface;
        return parent::__construct($context, $data);
    }

    public function execute()
    {
    }

    public function display()
    {
        //        return $this->CustomerRepositoryInterface->getById(1);
        $search = $this->SearchCriteriaBuilder->create();
        return $this->CustomerRepositoryInterface->getList($search)->getItems();
    }
}
