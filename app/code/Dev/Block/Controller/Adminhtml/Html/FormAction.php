<?php


namespace Dev\Block\Controller\Adminhtml\Html;


use Magento\Backend\App\Action;

class FormAction extends Action
{

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $contentData = $this->getRequest()->getParam('content');
        if (is_array($contentData)) {
            $content = $this->_objectManager->create('Dev\Block\Model\Content');
            $content->setData($contentData)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}
