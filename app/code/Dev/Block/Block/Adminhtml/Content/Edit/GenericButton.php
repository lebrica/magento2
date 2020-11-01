<?php


namespace Dev\Block\Block\Adminhtml\Content\Edit;


use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

class GenericButton
{
    /**
     * Url Builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * Registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     */
   public function __construct(Context $context, Registry $registry)
   {
       $this->urlBuilder = $context->getUrlBuilder();
       $this->registry = $registry;
   }

    /**
     * Return the synonyms group Id.
     *
     * @return int|null
     */
    public function getId()
    {
        $content = $this->registry->registry('content');
        return $content ? $content->getId() : null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
