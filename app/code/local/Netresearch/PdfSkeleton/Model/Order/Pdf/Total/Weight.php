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
 * Netresearch_PdfSkeleton_Model_Order_Pdf_Total_Weight
 *
 * @category Netresearch
 * @package  Netresearch_PdfSkeleton
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Netresearch_PdfSkeleton_Model_Order_Pdf_Total_Weight
    extends Mage_Sales_Model_Order_Pdf_Total_Default
{
    /**
     * Calculate the order items' weight and return totals information for display in PDF.
     * @return mixed[]
     */
    public function getTotalsForDisplay()
    {
        /** @var Mage_Sales_Model_Order $order */
        $order = $this->getOrder();
        $totalWeight = array_reduce($order->getAllItems(), function ($weight, Mage_Sales_Model_Order_Item $item) {
            $weight += $item->getWeight();
            return $weight;
        });

        return [[
            'amount'    => $totalWeight,
            'label'     => sprintf('%s:', $this->_getSalesHelper()->__("Total Weight")),
            'font_size' => $this->getFontSize() ? $this->getFontSize() : 7,
        ]];
    }
}
