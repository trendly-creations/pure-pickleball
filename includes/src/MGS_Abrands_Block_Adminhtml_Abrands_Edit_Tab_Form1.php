<?php

class MGS_Abrands_Block_Adminhtml_Abrands_Edit_Tab_Form1 extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('abrands_form', array('legend'=>Mage::helper('abrands')->__('Item Content')));
     
      $fieldset->addField('image', 'text', array(
          'label'     => Mage::helper('abrands')->__('Image'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'image',
      ));     
     
      if ( Mage::getSingleton('adminhtml/session')->getAbrandsData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getAbrandsData());
          Mage::getSingleton('adminhtml/session')->setAbrandsData(null);
      } elseif ( Mage::registry('abrands_data') ) {
          $form->setValues(Mage::registry('abrands_data')->getData());
      }
      return parent::_prepareForm();
  }
}