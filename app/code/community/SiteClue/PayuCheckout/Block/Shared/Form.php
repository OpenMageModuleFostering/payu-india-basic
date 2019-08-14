<?php
/**
 * SiteClue
 * @package    SiteClue_PayuCheckout
 * @copyright  Copyright (c) 2015-2016 SiteClue. (http://www.siteclue.com)
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
class SiteClue_PayuCheckout_Block_Shared_Form extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        $this->setTemplate('payucheckout/shared/form.phtml');
        parent::_construct();
    }
}