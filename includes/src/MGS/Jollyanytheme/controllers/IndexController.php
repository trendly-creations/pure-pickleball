<?php
class MGS_Jollyanytheme_IndexController extends Mage_Core_Controller_Front_Action
{
    public function ajaxAction()
    {
		$url = $this->getRequest()->getParam('url');
		$url = str_replace('ja-and-replace', '&', $url);
		if($this->getRequest()->isXmlHttpRequest()){
			$response = array();
			$response = Mage::helper('jollyanytheme')->getPageContent($url);
			$page = $this->getRequest()->getParam('page');
			$page = $page + 1;
			
			$arrUrl = explode('p=',$url);
			$newUrl = $arrUrl[0];
			if(isset($arrUrl[1])){
				$arrLastUrl = explode('&',$arrUrl[1]);
				if(isset($arrLastUrl[0])){
					$newUrl.='p='.$page;
				}
				if(isset($arrLastUrl[1])){
					$newUrl.='&'.$arrLastUrl[1];
				}
			}
			$response['newurl'] = $newUrl;
			$this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
		}
		else{
			$this->_redirectUrl($url);
		}
    }
}