<?php


namespace Dev\Block\Controller\Adminhtml\Html;


use Dev\Block\Model\ContentFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Save extends Action
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
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParam('content');

        if($data)
        {
           // var_dump($data);die();
            try{
                $id = isset($data['entity_id']) ? $data['entity_id'] : null;


                $contact = $this->contentFactory->create()->load($id);

                $data = array_filter($data, function($value) {return $value !== ''; });

                $contact->setData($data);
                $contact->save();

                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/*/');
            }
            catch(\Exception $e)
            {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $contact->getId()]);
            }
        }

        return $resultRedirect->setPath('*/*/');
    }
}
