<?php 
/**
 * SiteClue
 * @package    SiteClue_PayuCheckout
 * @copyright  Copyright (c) 2015-2016 SiteClue. (http://www.siteclue.com)
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
 
class SiteClue_PayuCheckout_SharedController extends SiteClue_PayuCheckout_Controller_Abstract
{
   
    protected $_redirectBlockType = 'payucheckout/shared_redirect';
    protected $_paymentInst = NULL;
	
	
	public function  successAction()
    {
        $response = $this->getRequest()->getPost();
		Mage::getModel('payucheckout/shared')->getResponseOperation($response);
        $this->_redirect('checkout/onepage/success');
    }
	
	
	
	 public function failureAction()
    {
       
	   $arrParams = $this->getRequest()->getPost();
	   Mage::getModel('payucheckout/shared')->getResponseOperation($arrParams);
       $this->getCheckout()->clear();
	   $this->_redirect('checkout/onepage/failure');
    }


    public function canceledAction()
    {
	    $arrParams = $this->getRequest()->getParams();
	
       
		Mage::getModel('payucheckout/shared')->getResponseOperation($arrParams);
		
		$this->getCheckout()->clear();
		$this->loadLayout();
        $this->renderLayout();
    }


   

    
}
    
    