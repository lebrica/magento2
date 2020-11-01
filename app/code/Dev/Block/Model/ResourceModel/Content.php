<?php


namespace Dev\Block\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

;class Content extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('my_content', 'entity_id');
    }
}
