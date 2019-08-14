<?php
/**
 * SiteClue
 * @package    SiteClue_PayuCheckout
 * @copyright  Copyright (c) 2015-2016 SiteClue. (http://www.siteclue.com)
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
 
class SiteClue_PayuCheckout_Model_Mysql4_Api_Debug extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('payucheckout/api_debug', 'debug_id');
    }
}