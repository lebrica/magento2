<?php


namespace Dev\Block\Controller\Adminhtml\Html;


use Dev\Block\Model\ContentFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Delete extends Action
{

    protected $resultPageFactory;
    protected $contentFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ContentFactory $contentFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->contentFactory = $contentFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $content = $this->contentFactory->create()->load($id);

        if(!$content)
        {
            $this->messageManager->addError(__('No content.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/', array('_current' => true));
        }

        try{
            $content->delete();
            $this->messageManager->addSuccess(__('Your content deleted !'));
        }
        catch(\Exception $e)
        {
            $this->messageManager->addError(__('Error while trying to delete contact'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}
