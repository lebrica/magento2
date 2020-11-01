<?php


namespace Dev\Block\Controller\Test;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $contactModel = $this->_objectManager->create('Dev\Block\Model\Content');
        $collection = $contactModel->getCollection()->addFieldToFilter('content', array('like'=> 'Paul Dupond'));
        foreach($collection as $contact) {
            var_dump($contact->getData());
        }
//        $this->_view->loadLayout();
//        $this->_view->renderLayout();
    }
}
