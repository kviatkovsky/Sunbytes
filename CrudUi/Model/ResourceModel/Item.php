<?php
namespace Sunbytes\CrudUi\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('sunbytes_crudui_item', 'item_id');
    }
}
