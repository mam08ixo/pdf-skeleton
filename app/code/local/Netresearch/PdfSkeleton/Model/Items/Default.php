<?php
/**
 * Netresearch PdfSkeleton
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to
 * newer versions in the future.
 *
 * PHP version 5
 *
 * @category  Netresearch
 * @package   Netresearch_PdfSkeleton
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/**
 * Netresearch_PdfSkeleton_Model_Items_Default
 *
 * @category Netresearch
 * @package  Netresearch_PdfSkeleton
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Netresearch_PdfSkeleton_Model_Items_Default
    extends FireGento_Pdf_Model_Items_Default
{
    /**
     * Add delivery time as option per line item.
     *
     * @return mixed[]
     */
    public function getItemOptions()
    {
        /** @var Mage_Sales_Model_Order_Item $orderItem */
        $orderItem = $this->getItem()->getOrderItem();

        $itemOptions = parent::getItemOptions();
        $itemOptions = array_merge($itemOptions, [[
            'label' => $orderItem->getProduct()->getResource()->getAttribute('delivery_time')->getFrontend()->getLabel(),
            'value' => $orderItem->getProduct()->getData('delivery_time'),
        ]]);

        return $itemOptions;
    }
}
