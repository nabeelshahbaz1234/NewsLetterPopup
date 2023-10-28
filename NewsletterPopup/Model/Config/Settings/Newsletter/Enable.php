<?php

namespace RltSquare\NewsletterPopup\Model\Config\Settings\Newsletter;

/**
 * Class for Enabling option
 */
class Enable implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            ['value' => '0', 'label' => __('Disable')],
            ['value' => '1', 'label' => __('Enable on Homepage Only')],
            ['value' => '2', 'label' => __('Enable on All Pages')]
        ];
    }
}
