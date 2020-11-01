<?php


namespace Dev\Block\Controller\Test;


use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ResponseInterface;

class View implements ActionInterface
{

    public function execute()
    {
        die('hello');
    }
}
