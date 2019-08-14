<?php
/**
 * SiteClue
 * @package    SiteClue_PayuCheckout
 * @copyright  Copyright (c) 2015-2016 SiteClue. (http://www.siteclue.com)
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

class SiteClue_PayuCheckout_Model_Source_DirectReturn
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'redirect', 'label' => 'Immediately returned to my website '),
            array('value' => 'link', 'label' => 'Given links only back to my website '),
        );
    }
}