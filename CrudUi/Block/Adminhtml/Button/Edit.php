<?php

namespace Sunbytes\CrudUi\Block\Adminhtml\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class Edit extends Generic implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'ui_form_edit.ui_form_edit',
                                'actionName' => 'save',
                                'params' => [
                                    true,
                                    ['id' => $this->context->getRequest()->getParam('id')]
                                ],
                            ],
                        ],
                    ],
                ],
            ],

            'class_name' => Container::SPLIT_BUTTON,
        ];
    }
}
