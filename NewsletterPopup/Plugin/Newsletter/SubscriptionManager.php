<?php
declare(strict_types=1);

namespace RltSquare\NewsletterPopup\Plugin\Newsletter;

use Exception;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Newsletter\Model\SubscriberFactory;
use Magento\Store\Model\StoreManagerInterface;

class SubscriptionManager
{
    protected Http $request;
    protected SubscriberFactory $subscriberFactory;
    protected StoreManagerInterface $storeManager;

    /**
     * @param Http $request
     * @param SubscriberFactory $subscriberFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(Http $request, SubscriberFactory $subscriberFactory, StoreManagerInterface $storeManager)
    {
        $this->request = $request;
        $this->subscriberFactory = $subscriberFactory;
        $this->storeManager = $storeManager;
    }

    /**
     * @throws Exception
     */
    public function aroundSubscribe(\Magento\Newsletter\Model\SubscriptionManager $subject, callable $proceed, $email, $storeId)
    {
        if ($this->request->isPost() && $this->request->getParam('selected_categories')) {

            $result = $proceed($email, $storeId);

            $gender = $this->request->getParam('gender');
            $selectedCategories = implode(',', $this->request->getParam('selected_categories', []));

            try {
                $websiteId = (int)$this->storeManager->getStore($storeId)->getWebsiteId();
            } catch (NoSuchEntityException $e) {
            }
            $subscriber = $this->subscriberFactory->create()->loadBySubscriberEmail($email, $websiteId);

            if ($subscriber->getId()) {
                $subscriber->setGender($gender);
                $subscriber->setSelectedCategories($selectedCategories); // Set the selected categories as a comma-separated string
                $subscriber->save();
            }
        }
        return $result;
    }
}
