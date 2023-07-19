<?php

namespace Sunbytes\CrudUi\Model;

use Sunbytes\CrudUi\Api\CrudApiInterface;
use Sunbytes\CrudUi\Model\ResourceModel\Item\CollectionFactory;

class CrudApi implements CrudApiInterface
{
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $itemCollection;

    public function __construct(CollectionFactory $itemCollection)
    {
        $this->itemCollection = $itemCollection;
    }

    /**
     * Retrieve module data
     *
     * @return array
     */
    public function getData()
    {
        $data = [];
        foreach ($this->itemCollection->create()->getItems() as $key => $item){
            $data[$key]['id'] = $item->getItemId();
            $data[$key]['Name'] = $item->getName();
            $data[$key]['Description'] = $item->getDescription();
        }

        return ['data' => $data];
    }
}
