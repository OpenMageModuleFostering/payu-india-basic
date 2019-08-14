<?php
/**
 * SiteClue
 * @package    SiteClue_PayuCheckout
 * @copyright  Copyright (c) 2015-2016 SiteClue. (http://www.siteclue.com)
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
 
abstract class SiteClue_PayuCheckout_Controller_Abstract extends Mage_Core_Controller_Front_Action
{
    protected function _expireAjax()
    {
        if (!$this->getCheckout()->getQuote()->hasItems()) {
            $this->getResponse()->setHeader('HTTP/1.1','403 Session Expired');
            exit;
        }
    }

   
    protected $_redirectBlockType;

    /**
     * Get singleton of Checkout Session Model
     *
     * @return Mage_Checkout_Model_Session
     */
    public function getCheckout()
    {
        return Mage::getSingleton('checkout/session');
    }

   
    public function redirectAction()
    {
               
        
        $session = $this->getCheckout();
        $quoteId = $session->getQuoteId();
		if($quoteId = ""){
			$quoteId = $session->getLastQuoteId();
		}
        if(!empty($quoteId)) {
            $session->setPayuCheckoutQuoteId($quoteId);
            $session->setPayuCheckoutRealOrderId($session->getLastRealOrderId());

            $order = Mage::getModel('sales/order');
            $order->loadByIncrementId($session->getLastRealOrderId());
            $order->addStatusToHistory($order->getStatus(), Mage::helper('payucheckout')->__('Customer was redirected to payu.'));
            $order->save();

            $this->getResponse()->setBody(
                $this->getLayout()
                    ->createBlock($this->_redirectBlockType)
                    ->setOrder($order)
                    ->toHtml()
            );        
            $session->unsQuoteId();
            $session->unsLastRealOrderId();
        } else {
            $this->_redirect('checkout/cart');
            return;
        }
    }


   

}