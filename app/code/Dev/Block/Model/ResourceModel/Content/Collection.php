<?php


namespace Dev\Block\Model\ResourceModel\Content;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init('Dev\Block\Model\Content', 'Dev\Block\Model\ResourceModel\Content');
    }
}
