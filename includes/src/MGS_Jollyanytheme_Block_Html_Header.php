<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Page
 * @copyright   Copyright (c) 2013 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Html page block
 *
 * @category   Mage
 * @package    Mage_Page
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class MGS_Jollyanytheme_Block_Html_Header extends Mage_Page_Block_Html_Header
{
    public function _construct()
    {
		if(Mage::getDesign()->getTheme('frontend')=='jollyany'){
			$header = Mage::getStoreConfig('jollyanytheme/general/header');
			if($header!=''){
				$this->setTemplate('page/html/header/'.$header.'.phtml');
			}
			else{
				$this->setTemplate('page/html/header/header.phtml');
			}
        }
		else{
			parent::_construct();
		}
    }
}
