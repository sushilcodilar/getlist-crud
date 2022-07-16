<?php
namespace Attribute\Extention\Controller\Index;

use Attribute\Extention\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Webapi\Rest\Request;
use Magento\Framework\Controller\Result\RedirectFactory;

class Save extends Action
{
    protected Context $context;

    protected pageFactory $pageFactory;


    /**
     * @var CustomerRepositoryInterface
     */
    private CustomerRepositoryInterface $CustomerRepositoryInterface;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var RedirectFactory
     */
    protected RedirectFactory $redirectFactory;

    public function __construct(
        Context $context,
        pageFactory $pageFactory,
        CustomerRepositoryInterface $CustomerRepositoryInterface,
        Request $request,
        RedirectFactory $redirectFactory
    ) {
        $this->pageFactory = $pageFactory;
        $this->CustomerRepositoryInterface = $CustomerRepositoryInterface;
        $this->request = $request;
        $this->redirectFactory = $redirectFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->request->getParam('id');
        $firstname = $this->request->getParam('firstname');
        $lastname = $this->request->getParam('lastname');
        $email = $this->request->getParam('email');

        $save = $this->CustomerRepositoryInterface->save($id);
        $save->setEmail($email);
        $save->setFirstname($firstname);
        $save->setLastname($lastname);
        $save->save();

        $resultRedirect = $this->redirectFactory->create();
        $resultRedirect->setPath('disdata/index/display');
        return $resultRedirect;

    }
}
