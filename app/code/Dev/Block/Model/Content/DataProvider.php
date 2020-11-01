<?php


namespace Dev\Block\Model\Content;


use Dev\Block\Model\ResourceModel\Content\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    public function __construct($name, $primaryFieldName, $requestFieldName, CollectionFactory $collectionFactory, array $meta = [], array $data = [])
    {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();

        foreach ($items as $content) {
            $this->loadedData[$content->getId()]['content'] = $content->getData();
        }

        return $this->loadedData;
    }
}
