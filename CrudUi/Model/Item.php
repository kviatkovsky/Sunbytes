<?php
namespace Sunbytes\CrudUi\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Item::class);
    }
}
