<?php
class MGS_Megamenu_Block_Megamenu extends Mage_Catalog_Block_Navigation
{
	protected $_setting;

	
	public function getMegamenuItems(){
		$store = Mage::app()->getStore();
		$menuCollection = Mage::getModel('megamenu/megamenu')
			->getCollection()
			->addStoreFilter($store)
			->addNowFilter()
			->addFieldToFilter('status', 1)
			->setOrder('position', 'ASC')
		;
		return $menuCollection;
	}
	
	public function getClass($item){
		$type = $item->getMenuType();
		$class = $item->getSpecialClass();
		$class.=' '.$item->getAlignMenu();
		if($item->getColumns()>1){
			$class.= " yamm-fw";
		}
		if($type==2){
			$class.= " static-menu";
			$currentUrl = Mage::helper("core/url")->getCurrentUrl();
			if($currentUrl==$item->getUrl()){
				$class.= " active";
			}
			
			if($item->getStaticContent()!=''){
				$class.= ' dropdown';
			}
		}
		else{

			$categoryId = $item->getCategoryId();
			$category = Mage::getModel('catalog/category')->load($categoryId);
			$subCatAccepp = $this->getSubCategoryAccepp($categoryId, $item);
			
			if(count($subCatAccepp)>0){
				$class.= ' dropdown';
			}
			if ($this->isCategoryActive($category)) {
				if(Mage::app()->getWebsite(true)->getDefaultStore()->getRootCategoryId() != $category->getId()){
					$class.= " active";
				}
			}
			
		}
		return $class;
	}
	
	public function getMenuHtml($item){
		$type = $item->getMenuType();
		if($type==2){
			return $this->getStaticMenu($item);
		}
		else{
			return $this->getCategoryMenu($item);
		}
	}
	
	public function getStaticMenu($item){
		$html = '<a href="'.$item->getUrl().'" class="level0';
		if($item->getStaticContent()!=''){
			$html.= ' dropdown-toggle';
		}
		$html.= '">';
		
		$html.=$item->getTitle();
		if($item->getStaticContent()!=''){
			$html.= ' <div class="arrow-up"></div>';
		}
		$html.='</a>';
		if($item->getStaticContent()!=''){
			$col = $item->getColumns();
			$percentOfWidth = 100/Mage::getStoreConfig('megamenu/general/max_column');

			$html.='<ul class="dropdown-menu">';
			
			$helper = Mage::helper('cms');
			$processor = $helper->getPageTemplateProcessor();
			$staticContent = $processor->filter($item->getStaticContent());
			
			if($col==1){
				$staticContent = str_replace('<ul>', '', $staticContent);
				$staticContent = str_replace('</ul>', '', $staticContent);
			}
			else{
				$html.='<li>';
			}
			
			$html.= $staticContent;
			
			if($col!=1){
				$html.='</li>';
			}

			$html.='</ul>';
		}
		return $html;
	}
	
	public function getCategoryMenu($item){
		$html = '<a';
		$categoryId = $item->getCategoryId();
		$subCatAccepp = $this->getSubCategoryAccepp($categoryId, $item);
		if($categoryId){
			$category = Mage::getModel('catalog/category')->load($categoryId);
			$html.=' href="';
			if($item->getUrl()!=''){
				$html.= $item->getUrl().'"';
			}
			else{
				if(Mage::app()->getWebsite(true)->getDefaultStore()->getRootCategoryId() == $category->getId()){
					$html.='#" onclick="return false"';
				}
				else{
					$html.= $this->getCategoryUrl($category).'"';
				}
			}
		}
		$html.=' class="level0';
		
		if(count($subCatAccepp)>0){
			$html.= ' dropdown-toggle';
		}
		
		$html.='">';
		
		$html.=$item->getTitle();
		if(count($subCatAccepp)>0){
			$html.= ' <div class="arrow-up"></div>';
		}
		$html.= '</a>';
		
		if(count($subCatAccepp)>0){

			$html.='<ul class="dropdown-menu">';
			$columnAccepp = count($subCatAccepp);
			if($columnAccepp>0){
				$columns = $item->getColumns();

				$arrOneElement = array_chunk($subCatAccepp, 1);
				$countCat = count($subCatAccepp);
				$count = 0;
				while ($countCat > 0) {
					for($i=0; $i<$columns; $i++){
						if(isset($subCatAccepp[$count])){
							$arrColumn[$i][] = $subCatAccepp[$count];
							$count++;
						}
					}
					$countCat--;
				}
				
				if($columns>1){
					$html.= '<li><div class="yamm-content"><div class="row">';
				}
				
				foreach($arrColumn as $_arrColumn){
					$html.= $this->drawListSub($item, $_arrColumn);
				}
				
				if($columns>1){
					$html.= '</div></div></li>';
				}

			}


			$html.='</ul>';
		}
		
		return $html;
	}
	
	public function drawListSub($item, $catIds){
		$html = '';
	
		if($item->getColumns()>1){
			$html.='<ul class="col-sm-3">';
		}

		if(count($catIds)>0){
			foreach($catIds as $categoryId){
				$category = Mage::getModel('catalog/category')->load($categoryId);
				$html.= $this->drawList($category, $item);
			}
		}
		
		if($item->getColumns()>1){
			$html.='</ul>';
		}
		
		return $html;
	}
	
	public function drawList($category, $item, $level=1){
		$maxLevel = $item->getMaxLevel();
		if($maxLevel=='' || $maxLevel==NULL){
			$maxLevel = Mage::getStoreConfig('megamenu/general/max_level');
		}
		
		if($maxLevel==0 || $maxLevel=='' || $maxLevel==NULL){
			$maxLevel = 100;
		}
		
		$children = $this->getSubCategoryAccepp($category->getId(), $item);
		$childrenCount = count($children);
		
		$htmlLi = '<li';
		
		if($childrenCount>0 && $item->getColumns()==1){
			$htmlLi .= ' class="dropdown-submenu"';
		}
		
		$htmlLi .= '>';

		$html[] = $htmlLi;
		$html[] = '<a href="'.$this->getCategoryUrl($category).'">';
		if($item->getColumns()>1 && $level==1){
			$html[] = '<span class="mega-menu-sub-title">';
		}
		
		$html[] = $category->getName();
		
		if($item->getColumns()>1 && $level==1){
			$html[] = '</span>';
		}
		$html[] = '</a>';
		
		if($level<$maxLevel){
			$maxSub = Mage::getStoreConfig('megamenu/general/max_subcat');
			if($maxSub==0 || $maxSub==''){
				$maxSub = 100;
			}
			$htmlChildren = '';
			if($childrenCount>0){
				$i=0;
				foreach ($children as $child) {
					$i++;
					if($i<=$maxSub){
						$_child = Mage::getModel('catalog/category')->load($child);
						$htmlChildren .= $this->drawList($_child, $item, ($level + 1));
					}
				}
			}
			if (!empty($htmlChildren)) {
				$html[] = '<ul';
				if($item->getColumns()>1){
					$html[] = ' class="sub-menu"';
				}
				else{
					$html[] = ' class="dropdown-menu"';
				}
				$html[] = '>';
				$html[] = $htmlChildren;
				$html[] = '</ul>';
			}
		}
        $html[] = '</li>';
        $html = implode("\n", $html);
        return $html;
	}
	
	public function getSubCategoryAccepp($categoryId, $item){
		$subCatExist = explode(',', $item->getSubCategoryIds());
		
		$category = Mage::getModel('catalog/category')->load($categoryId);
		
		$children = $category->getChildrenCategories();
		$childrenCount = count($children);
		
		$subCatId = array();
		if($childrenCount>0){
			foreach ($children as $child){
				if(in_array($child->getId(), $subCatExist)){
					$subCatId[] = $child->getId();
				}
			}
		}
		return $subCatId;
	}
}