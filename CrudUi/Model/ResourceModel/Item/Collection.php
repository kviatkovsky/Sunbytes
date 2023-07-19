<?php

namespace Sunbytes\CrudUi\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sunbytes\CrudUi\Model\Item;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Item::class, \Sunbytes\CrudUi\Model\ResourceModel\Item::class);
    }
}
