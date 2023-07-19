<?php

namespace Sunbytes\CrudUi\Controller\Adminhtml\Index;

use Sunbytes\CrudUi\Model\ItemFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Data\Form\FormKey\Validator;

class Save extends Action
{
    /**
     * @var ItemFactory
     */
    private ItemFactory $itemFactory;

    /**
     * @var Validator
     */
    private Validator $formKeyValidator;

    /**
     * @param Context $context
     * @param ItemFactory $itemFactory
     * @param Validator $formKeyValidator
     */
    public function __construct(
        Context     $context,
        ItemFactory $itemFactory,
        Validator   $formKeyValidator
    )
    {
        $this->itemFactory = $itemFactory;
        $this->formKeyValidator = $formKeyValidator;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPageFactory = $this->resultRedirectFactory->create();
        if (!$this->formKeyValidator->validate($this->getRequest())) {
            $this->messageManager->addErrorMessage(__("Form key is Invalidate"));
            return $resultPageFactory->setPath('*/*/index');
        }

        $id = $this->getRequest()->getParam('id');
        $data = $this->getRequest()->getPostValue();
        try {
            if ($data) {
                if ($id) {
                    $data['item_id'] = $id;
                }

                $model = $this->itemFactory->create();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
        }

        return $resultPageFactory->setPath('*/*/index');
    }
}
