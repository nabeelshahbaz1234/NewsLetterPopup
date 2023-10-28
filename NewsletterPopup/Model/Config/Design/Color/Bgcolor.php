<?php
namespace RltSquare\NewsletterPopup\Model\Config\Design\Color;

/**
 * Class Background color
 */
class Bgcolor implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'primary', 'label' => __('Primary')],
            ['value' => 'light', 'label' => __('Light')],
            ['value' => 'dark', 'label' => __('Dark')]
        ];
    }
}
