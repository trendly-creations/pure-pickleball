<?php if (!defined('ABSPATH')) exit('restricted access');
/** Backend settings for symptom checker */
// @TODO: Add validation support
$options = array();


$options['sidebar'] = array(
    'label' => __('Gallery With Sidebar', SH_NAME),
    'type' => 'dropdown',
    'value' => array('active' => 'Active', 'inactive' => 'Inactive'),
    'validation' => 'required',
    'std' => 'active',
    'info' => __('Active or Inactive Sidebar on gallery.', SH_NAME));

$options['images_per_page'] = array(
    'label' => __('Images Per Page', SH_NAME),
    'type' => 'input',
    'std' => '12',
    'validation' => 'trim|required|is_natural_no_zero',
    'info' => __('Number of images you want to show per page', SH_NAME));

$options['album_on_single'] = array(
    'label' => __('Show Album on Single Gallery Post', SH_NAME),
    'type' => 'dropdown',
    'value' => array('active' => 'Active', 'inactive' => 'Inactive'),
    'validation' => 'required',
    'std' => 'active',
    'info' => __('Active or Inactive Album on Single.', SH_NAME));

$options['album_on_category'] = array(
    'label' => __('Show Album on Category', SH_NAME),
    'type' => 'dropdown',
    'value' => array('active' => 'Active', 'inactive' => 'Inactive'),
    'validation' => 'required',
    'std' => 'active',
    'info' => __('Active or Inactive Album on gallery category.', SH_NAME));
$options['title_limit'] = array(
    'label' => __('Title Limit (Grid View)', SH_NAME),
    'type' => 'input',
    'value' => '',
    'validation' => 'required',
    'std' => '25',
    'info' => __('The title character limit on grid view.', SH_NAME));

$options['content_limit'] = array(
    'label' => __('Content Limit (List View)', SH_NAME),
    'type' => 'input',
    'value' => '',
    'validation' => 'required',
    'std' => '25',
    'info' => __('The content words limit on list view.', SH_NAME));