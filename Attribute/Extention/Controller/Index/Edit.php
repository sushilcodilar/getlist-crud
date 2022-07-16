<?php
namespace Attribute\Extention\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
{
    /**
     * @var Context
     */
    protected Context $context;

    /**
     * @var pageFactory
     */
    protected pageFactory $pageFactory;


    public function __construct(
        Context $context,
        pageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}
