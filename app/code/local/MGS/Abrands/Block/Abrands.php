<?php
class MGS_Abrands_Block_Abrands extends Mage_Core_Block_Template
{
	public function getBrands(){
		$brands = Mage::getModel('abrands/abrands')
			->getCollection()
			->addFieldToFilter('status', 1);
		
		return $brands;
	}
}