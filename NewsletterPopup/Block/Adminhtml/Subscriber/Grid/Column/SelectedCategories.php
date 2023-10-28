<?php
namespace RltSquare\NewsletterPopup\Block\Adminhtml\Subscriber\Grid\Column;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;

class SelectedCategories extends AbstractRenderer
{
    /**
     * Render the custom column for selected categories.
     *
     * @param DataObject $row
     * @return string
     */
    public function render(DataObject $row): string
    {
        $categories = $row->getData('selected_categories');

        if ($categories !== null) {
            $categoriesArray = explode(',', $categories);
            return implode(', ', $categoriesArray);
        }

        return ''; // Return an empty string if $categories is null
    }
}
