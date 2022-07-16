<?php
namespace Attribute\Extention\Block;

use Attribute\Extention\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Webapi\Rest\Request;

class Edit extends Template
{
    /**
     * @var PageFactory
     */
    private PageFactory $pageFactory;

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

    /**
     * @var Request
     */
    protected Request $request;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        CustomerRepositoryInterface $CustomerRepositoryInterface,
        SearchCriteriaBuilder $SearchCriteriaBuilder,
        Request $request,
        array $data = []
    ) {
        $this->pageFactory = $pageFactory;
        $this->SearchCriteriaBuilder = $SearchCriteriaBuilder;
        $this->CustomerRepositoryInterface = $CustomerRepositoryInterface;
        $this->request = $request;
        return parent::__construct($context, $data);
    }

    public function edit()
    {
        $filter = $this->request->getParam('id');
        return $this->CustomerRepositoryInterface->getById($filter);
    }
}
