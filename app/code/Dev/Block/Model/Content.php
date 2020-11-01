<?php


namespace Dev\Block\Model;

use Magento\Framework\Model\AbstractModel;

class Content extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Dev\Block\Model\ResourceModel\Content::class);
    }

}
