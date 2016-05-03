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
 * Netresearch_PdfSkeleton_Model_Engine_Invoice_Default
 *
 * @category Netresearch
 * @package  Netresearch_PdfSkeleton
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Netresearch_PdfSkeleton_Model_Engine_Invoice_Default
    extends FireGento_Pdf_Model_Engine_Invoice_Default
{
    /**
     * Set custom renderer for order items.
     *
     * @param string $type
     */
    protected function _initRenderer($type)
    {
        parent::_initRenderer($type);

        $this->_renderers['default'] = array(
            'model'    => 'pdfskeleton/items_default',
            'renderer' => null
        );
    }

    /**
     * Prepend order items' total weight.
     *
     * @param Mage_Sales_Model_Abstract $source
     * @return Mage_Sales_Model_Order_Pdf_Total_Default[]
     */
    protected function _getTotalsList($source)
    {
        $totals = parent::_getTotalsList($source);

        array_unshift($totals, Mage::getModel('pdfskeleton/order_pdf_total_weight'));

        return $totals;
    }
}
