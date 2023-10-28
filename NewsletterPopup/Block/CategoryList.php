<?php

namespace RltSquare\NewsletterPopup\Block;

use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;

class CategoryList extends Template
{
    protected CollectionFactory $categoryCollectionFactory;

    public function __construct(
        Template\Context  $context,
        CollectionFactory $categoryCollectionFactory,
        array             $data = []
    )
    {
        parent::__construct($context, $data);
        $this->categoryCollectionFactory = $categoryCollectionFactory;
    }

    /**
     * @throws LocalizedException
     */
    public function getLevelTwoCategories()
    {
        $categoryCollection = $this->categoryCollectionFactory->create();
        $categoryCollection->addAttributeToSelect('*');
        $categoryCollection->addFieldToFilter('level', 2);
        $categoryCollection->addIsActiveFilter();
        $categoryCollection->addUrlRewriteToResult();
        $categoryCollection->addAttributeToSelect('name');
        $categoryCollection->load();

        return $categoryCollection;
    }
}
