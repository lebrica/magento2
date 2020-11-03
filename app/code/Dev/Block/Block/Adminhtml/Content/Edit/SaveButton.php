<?php


namespace Dev\Block\Block\Adminhtml\Content\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save Contact'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' =>
                    ['button' => ['event' => 'save'],
                    ]
            ],
            'on_click' => 'deleteConfirm(\''
                . __('Are you sure you want to delete this contact ?')
                . '\', \'' . $this->getSaveUrl() . '\')',
          // 'on_click' => sprintf("location.href= '%s';", $this->getSaveUrl()),
            'sort_order' => 90
        ];
    }

    public function getSaveUrl()
    {
        return $this->getUrl('*/*/save') ;
    }
}
