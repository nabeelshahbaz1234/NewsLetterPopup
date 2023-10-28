<?php

namespace RltSquare\NewsletterPopup\Model\Config\Backend\Design\Color;

/**
 * Class for Validate transparent
 */
class Validatetransparent extends \Magento\Framework\App\Config\Value
{
    /**
     * @return $this|Validatetransparent
     */
    public function beforeSave()
    {
        $v = $this->getValue();
        if ($v == 'rgba(0, 0, 0, 0)') {
            $this->setValue('transparent');
        }
        return $this;
    }
}
