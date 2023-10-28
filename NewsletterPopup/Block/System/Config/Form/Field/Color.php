<?php

namespace RltSquare\NewsletterPopup\Block\System\Config\Form\Field;

use Magento\Framework\Registry;

/**
 * Class for Color
 */
class Color extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * Color constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param Registry $coreRegistry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        Registry $coreRegistry,
        array $data = []
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $base = $this->getBaseUrl();
        $html = $element->getElementHtml();
        $cpPath = $base.'pub/media/js/';
        if (!$this->_coreRegistry->registry('colorpicker_loaded')) {
            $this->_coreRegistry->registry('colorpicker_loaded', 1);
        }
        $html .= '<script type="text/javascript">
                var el = document.getElementById("'. $element->getHtmlId() .'");
                el.className = el.className + " jscolor {refine:false}";
            </script>';
        return $html;
    }
}
