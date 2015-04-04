<?php

$installer = $this;

$installer->startSetup();


Mage::app()->setUpdateMode(false);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
if (!Mage::registry('isSecureArea'))
	Mage::register('isSecureArea', 1);

$content = <<<EOD
<div class="social-icons"><span><a title="Facebook" href="#" data-toggle="tooltip" data-placement="bottom"><em class="fa fa-facebook">&nbsp;</em></a></span> <span><a title="Google Plus" href="#" data-toggle="tooltip" data-placement="bottom"><em class="fa fa-google-plus">&nbsp;</em></a></span> <span><a title="Twitter" href="#" data-toggle="tooltip" data-placement="bottom"><em class="fa fa-twitter">&nbsp;</em></a></span> <span><a title="Youtube" href="#" data-toggle="tooltip" data-placement="bottom"><em class="fa fa-youtube">&nbsp;</em></a></span> <span class="last"><a title="Linkedin" href="#" data-toggle="tooltip" data-placement="bottom"><em class="fa fa-linkedin">&nbsp;</em></a></span></div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Socials',
	'identifier' => 'jollyany_socials',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany_socials');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}


$content = <<<EOD
<div class="callus"><span class="topbar-phone"><em class="fa fa-phone"></em> 1-900-324-5467</span></div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Callus',
	'identifier' => 'jollyany_callus',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany_callus');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="row padding-top">
<div class="col-sm-8">
<div class="entry shop-banner">
<div class="title">
<h3>MENS COLLECTIONS</h3>
</div>
<img class="img-responsive" src="{{media url="wysiwyg/banner_shop_02.jpg"}}" alt="" />
<div class="banner-hover">&nbsp;</div>
</div>
<div class="entry shop-banner">
<div class="title">
<h3>WOMENS COLLECTIONS</h3>
</div>
<img class="img-responsive" src="{{media url="wysiwyg/banner_shop_03.jpg"}}" alt="" />
<div class="banner-hover">&nbsp;</div>
</div>
</div>
<div class="col-sm-4 shop-banner">
<div class="entry">
<div class="title">
<h3>ADVERTISE<br /> YOUR BRANDS</h3>
</div>
<img class="img-responsive" src="{{media url="wysiwyg/banner_shop_01.jpg"}}" alt="" />
<div class="banner-hover big">&nbsp;</div>
</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Shop Banners',
	'identifier' => 'jollyany_shop_banners',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany_shop_banners');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 first">
<div class="ch-item">
<div class="ch-info-wrap">
<div class="ch-info">
<div class="ch-info-front"><em class="fa fa-bookmark fa-4x">&nbsp;</em>
<h3>PROTECTED PACKAGE</h3>
</div>
<div class="ch-info-back">
<h3>RESULTS</h3>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
</div>
</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Custom Services 1',
	'identifier' => 'jollyany-custom-services-1',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-custom-services-1');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="ch-item">
<div class="ch-info-wrap">
<div class="ch-info">
<div class="ch-info-front"><em class="fa fa-truck fa-4x">&nbsp;</em>
<h3>FAST DELIVERY</h3>
</div>
<div class="ch-info-back">
<h3>RESULTS</h3>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
</div>
</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Custom Services 2',
	'identifier' => 'jollyany-custom-services-2',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-custom-services-2');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="ch-item">
<div class="ch-info-wrap">
<div class="ch-info">
<div class="ch-info-front"><em class="fa fa-plane fa-4x">&nbsp;</em>
<h3>SELECT SHIPPING TYPE</h3>
</div>
<div class="ch-info-back">
<h3>RESULTS</h3>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
</div>
</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Custom Services 3',
	'identifier' => 'jollyany-custom-services-3',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-custom-services-3');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 last">
<div class="ch-item">
<div class="ch-info-wrap">
<div class="ch-info">
<div class="ch-info-front"><em class="fa fa-sun-o fa-4x">&nbsp;</em>
<h3>SUPPORT &amp; DESK</h3>
</div>
<div class="ch-info-back">
<h3>RESULTS</h3>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
</div>
</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Custom Services 4',
	'identifier' => 'jollyany-custom-services-4',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-custom-services-4');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="container">
<div class="general-title">
<h2>Our Working Process</h2>
<hr />
<p class="lead">These is the team behind Jollyany Agency</p>
</div>
<div class="custom-services">{{widget type="cms/widget_block" template="cms/widget/static_block/default.phtml" block_id="jollyany-custom-services-1"}} {{widget type="cms/widget_block" template="cms/widget/static_block/default.phtml" block_id="jollyany-custom-services-2"}} {{widget type="cms/widget_block" template="cms/widget/static_block/default.phtml" block_id="jollyany-custom-services-3"}} {{widget type="cms/widget_block" template="cms/widget/static_block/default.phtml" block_id="jollyany-custom-services-4"}}</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Custom Services',
	'identifier' => 'jollyany-custom-services',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-custom-services');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<img src="{{media url="wysiwyg/parallax_06.jpg"}}" alt="" />
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Custom Services Background',
	'identifier' => 'jollyany-custom-services-background',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-custom-services-background');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="calloutbox-full-mini">
<div class="container">
<div class="messagebox">
<h1>FREE SHIPPING FOR ORDERS OVER $49 DONT MISS THIS PROMO!</h1>
<a class="btn btn-dark btn-lg" href="#">SHOP NOW!</a></div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Free Shipping',
	'identifier' => 'jollyany-free-shipping',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-free-shipping');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Invst igationes demonstraverunt lectores legemer lius quod ii legunt saepius. Claritas est etiam processus dynamicusm lectorum.</p>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Footer About Us',
	'identifier' => 'jollyany-footer-about-us',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-footer-about-us');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="widget">
<div class="title">
<h3>Recent Posts</h3>
</div>
<ul class="footer_post">
<li><a href="#"><img class="img-rounded" src="{{media url="wysiwyg/footer_post_01.jpg"}}" alt="" /></a></li>
<li><a href="#"><img class="img-rounded" src="{{media url="wysiwyg/footer_post_02.jpg"}}" alt="" /></a></li>
<li><a href="#"><img class="img-rounded" src="{{media url="wysiwyg/footer_post_03.jpg"}}" alt="" /></a></li>
<li><a href="#"><img class="img-rounded" src="{{media url="wysiwyg/footer_post_04.jpg"}}" alt="" /></a></li>
<li><a href="#"><img class="img-rounded" src="{{media url="wysiwyg/footer_post_05.jpg"}}" alt="" /></a></li>
<li><a href="#"><img class="img-rounded" src="{{media url="wysiwyg/footer_post_06.jpg"}}" alt="" /></a></li>
</ul>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Footer Recent Posts',
	'identifier' => 'jollyany-footer-posts',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-footer-posts');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="shop-banner">
<div class="entry">
<div class="title">
<h3>ADVERTISE<br /> YOUR BRANDS</h3>
</div>
<img class="img-responsive" src="{{media url="wysiwyg/banner_shop_01.jpg"}}" alt="" />
<div class="banner-hover big">&nbsp;</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Left Banner',
	'identifier' => 'jollyany_left_banner',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany_left_banner');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="shop-banner">
<div class="entry">
<div class="title">
<h3>ADVERTISE<br /> YOUR BRANDS</h3>
</div>
<img class="img-responsive" src="{{media url="wysiwyg/banner_shop_01.jpg"}}" alt="" />
<div class="banner-hover big">&nbsp;</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Right Banner',
	'identifier' => 'jollyany_right_banner',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany_right_banner');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}


$content = <<<EOD
<img src="{{media url="wysiwyg/parallax_03_1.jpg"}}" alt="" />
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Our Brands Background',
	'identifier' => 'jollyany-our-brands-background',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-our-brands-background');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="container">
<div class="general-title">
<h2>Our Brands</h2>
<hr />
<p class="lead">These is the team behind Jollyany Agency</p>
</div>
<div class="clients padding-top text-center">
<div class="client-wrap col-lg-3 first"><a title="" href="#"><img src="{{media url="wysiwyg/client_logo_01_1.png"}}" alt="" /></a></div>
<div class="client-wrap col-lg-3"><a title="" href="#"><img src="{{media url="wysiwyg/client_logo_02_1.png"}}" alt="" /></a></div>
<div class="client-wrap col-lg-3"><a title="" href="#"><img src="{{media url="wysiwyg/client_logo_03_1.png"}}" alt="" /></a></div>
<div class="client-wrap col-lg-3 last"><a title="" href="#"><img src="{{media url="wysiwyg/client_logo_04_1.png"}}" alt="" /></a></div>
<div class="client-wrap col-lg-3 first no-border"><a title="" href="#"><img src="{{media url="wysiwyg/client_logo_05_1.png"}}" alt="" /></a></div>
<div class="client-wrap col-lg-3 no-border"><a title="" href="#"><img src="{{media url="wysiwyg/client_logo_06_1.png"}}" alt="" /></a></div>
<div class="client-wrap col-lg-3 no-border"><a title="" href="#"><img src="{{media url="wysiwyg/client_logo_07_1.png"}}" alt="" /></a></div>
<div class="client-wrap col-lg-3 last no-border"><a title="" href="#"><img src="{{media url="wysiwyg/client_logo_08_1.png"}}" alt="" /></a></div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Footer Our Brands',
	'identifier' => 'jollyany-our-brands',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany-our-brands');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}


$content = <<<EOD
<div class="full-width-services">
<div class="container">
<div class="col-md-4">
<div class="content">
<h3>Free Shipping</h3>
<span class="fa fa-truck ">&nbsp;</span>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit</p>
</div>
</div>
<div class="col-md-4">
<div class="content">
<h3>24/7 Support</h3>
<span class="fa fa-users">&nbsp;</span>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit</p>
</div>
</div>
<div class="col-md-4">
<div class="content">
<h3>Money Back Guarantee</h3>
<span class="fa fa-mail-reply-all ">&nbsp;</span>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit</p>
</div>
</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Homepage Top Services',
	'identifier' => 'homepage_services',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('homepage_services');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="full-width-services mini-services">
<div class="container">
<div class="col-md-4">
<div class="content">
<p><span class="fa fa-truck ">&nbsp;</span> Free Shipping <span>for oder over $99</span></p>
</div>
</div>
<div class="col-md-4">
<div class="content">
<p><span class="fa fa-users">&nbsp;</span> 24/7 Support <span>feel free to call</span></p>
</div>
</div>
<div class="col-md-4">
<div class="content">
<p><span class="fa fa-mail-reply-all ">&nbsp;</span> 30 days<span>Money Back Guarantee</span></p>
</div>
</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Top Services Mini',
	'identifier' => 'jollyany_homepage_services_mini',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany_homepage_services_mini');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}

$content = <<<EOD
<div class="white-wrapper footer-testimonial">
<div class="container">
<div class="testimonial-widget">
<div id="owl-testimonial" class="owl-carousel">
<div class="testimonial">
<p class="lead">Gorgeous, just gorgeous I love this theme. The nicest theme I ever worked with and I have worked with hundreds<br /> of them. Thanks for beautiful work, keep it up!</p>
<h3>Filiz &Ouml;ZER - Jolly Themes</h3>
</div>
<div class="testimonial">
<p class="lead">Gorgeous, just gorgeous I love this theme. The nicest theme I ever worked with and I have worked with hundreds<br /> of them. Thanks for beautiful work, keep it up!</p>
<h3>Na Vicky - Jolly Themes</h3>
</div>
<div class="testimonial">
<p class="lead">Gorgeous, just gorgeous I love this theme. The nicest theme I ever worked with and I have worked with hundreds of them. Thanks for beautiful work, keep it up!</p>
<h3>James Watson - Envato</h3>
</div>
</div>
</div>
</div>
</div>
EOD;

$cmsBlock = array(
	'title' => 'Jollyany Footer Testimonial',
	'identifier' => 'jollyany_footer_testimonial',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0)
);

$block = Mage::getModel('cms/block')->load('jollyany_footer_testimonial');

if (!$block->getId()) {
	Mage::getModel('cms/block')->setData($cmsBlock)->save();
} else {
	$block->setContent($content)
		->save();
}


// Create Homepage
$content = <<<EOD
<div class="messagebox">
<h2>Welcome to Jollyany &amp; we do <span class="rotate">awesome, amazing, powerful</span> stuff.</h2>
<p class="lead">Hey Everyone! We are Jollyany and we make really beautiful and amazing stuff. This can be used to describe what you do,<br /> how you do it, &amp; who you do it for. Don&rsquo;t Miss the Awesome Theme</p>
</div>
<div class="clearfix">&nbsp;</div>
<div>{{widget type="cms/widget_block" template="cms/widget/static_block/default.phtml" block_id="jollyany_shop_banners"}} {{block type="catalog/product" name="featured.products" template="catalog/product/featured.phtml"}}</div>
EOD;

$layout = <<<EOD
<reference name="top.container">
            <block type="cms/block" name="homepage_slide">
                <action method="setBlockId"><block_id>jollyany-homepage-slider</block_id></action>
            </block>
        </reference>
EOD;

$cmsPage = array(
	'title' => 'Jollyany Homepage',
	'identifier' => 'jollyany-home',
	'content' => $content,
	'layout_update_xml' => $layout,
	'is_active' => 1,
	'stores' => array(0),
	'root_template' => 'one_column'
);
$page = Mage::getModel('cms/page')->load('jollyany-home');

if (!$page->getId()) {
	Mage::getModel('cms/page')->setData($cmsPage)->save();
} else {
	$page->setContent($content)
		->save();
}

// Create Homepage 2
$content = <<<EOD
<div class="calloutbox">
<div class="col-lg-10">
<h2>FREE SHIPPING FOR ALL ORDERS &amp; We deliver to you in 3 days</h2>
<p>Accusantium quam, ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>
</div>
<div class="col-lg-2"><a class="btn pull-right btn-default btn-dark btn-lg margin-top" href="#">Purchase now!</a></div>
</div>
<div class="slider-shadow without">&nbsp;</div>
<div id="content" class="col-lg-9 col-md-9 col-sm-12 col-xs-12">{{widget type="catalog/product_widget_new" display_type="new_products" products_count="10" template="catalog/product/widget/new/content/new_grid.phtml"}} {{block type="catalog/product_list" name="featured.products.home" template="catalog/product/featured_2.phtml"}}</div>
<div id="sidebar" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">{{block type="catalog/product_list" name="left.bestselling" template="catalog/product/bestselling.phtml"}}{{block type="newsletter/subscribe" name="home.newsletter" template="newsletter/subscribe2.phtml"}}</div>
EOD;

$layout = <<<EOD
<reference name="top.container">
            <block type="cms/block" name="homepage_slide">
                <action method="setBlockId"><block_id>jollyany-homepage-slider</block_id></action>
            </block>
        </reference>
EOD;

$cmsPage = array(
	'title' => 'Jollyany Homepage 2',
	'identifier' => 'jollyany-home-2',
	'content' => $content,
	'layout_update_xml' => $layout,
	'is_active' => 1,
	'stores' => array(0),
	'root_template' => 'one_column'
);
$page = Mage::getModel('cms/page')->load('jollyany-home-2');

if (!$page->getId()) {
	Mage::getModel('cms/page')->setData($cmsPage)->save();
} else {
	$page->setContent($content)
		->save();
}

// Create Homepage 3
$content = <<<EOD
<div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">{{widget type="catalog/product_widget_new" display_type="new_products" products_count="10" column_count="4" template="catalog/product/widget/new/content/new_grid.phtml"}}{{block type="catalog/product_list" name="featured.products.home" column_count="4" template="catalog/product/featured_2.phtml"}}
<div class="padding-top">
<div class="entry shop-banner"><img class="img-responsive" src="{{media url="wysiwyg/home-bottom-banner.jpg"}}" alt="" />
<div class="banner-hover"><a href="http://www.magesolution.com/jollyany/index.php/en/women.html">&nbsp;</a></div>
</div>
</div>
{{block type="catalog/product_list" name="bestselling" template="catalog/product/bestselling_2.phtml"}}</div>
EOD;

$layout = <<<EOD
<reference name="top.container">
            <block type="cms/block" name="homepage_slide">
                <action method="setBlockId"><block_id>jollyany-homepage-slider</block_id></action>
            </block>
<block type="cms/block" name="homepage_services">
                <action method="setBlockId"><block_id>homepage_services </block_id></action>
            </block>
        </reference>
<reference name="before_footer">
<remove name="home.parallax"/>
			<block type="core/template" name="home.parallax2" template="theme/before_footer_2.phtml"/>
		</reference>
EOD;

$cmsPage = array(
	'title' => 'Jollyany Homepage 3',
	'identifier' => 'jollyany-home-3',
	'content' => $content,
	'layout_update_xml' => $layout,
	'is_active' => 1,
	'stores' => array(0),
	'root_template' => 'one_column'
);
$page = Mage::getModel('cms/page')->load('jollyany-home-3');

if (!$page->getId()) {
	Mage::getModel('cms/page')->setData($cmsPage)->save();
} else {
	$page->setContent($content)
		->save();
}


// Create Homepage 4
$content = <<<EOD
<div class="calloutbox">
<div class="col-lg-10">
<h2>FREE SHIPPING FOR ALL ORDERS &amp; We deliver to you in 3 days</h2>
<p>Accusantium quam, ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>
</div>
<div class="col-lg-2"><a class="btn pull-right btn-default btn-dark btn-lg margin-top" href="#">Purchase now!</a></div>
</div>
<div class="slider-shadow without">&nbsp;</div>
<div id="content" class="col-lg-9 col-md-9 col-sm-12 col-xs-12">{{widget type="catalog/product_widget_new" display_type="new_products" products_count="10" template="catalog/product/widget/new/content/new_grid.phtml"}} {{block type="catalog/product_list" name="featured.products.home" template="catalog/product/featured_2.phtml"}}<hr />{{widget type="blog/last" blocks_count="2" categories="2"}}</div>
<div id="sidebar" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">{{block type="catalog/product_list" name="left.bestselling" template="catalog/product/bestselling.phtml"}}{{block type="newsletter/subscribe" name="home.newsletter" template="newsletter/subscribe2.phtml"}}<br />{{widget type="cms/widget_block" template="cms/widget/static_block/default.phtml" block_id="20"}}</div>
<div class="clearfix">&nbsp;</div>
EOD;

$layout = <<<EOD
<reference name="top.container">
<block type="cms/block" name="jollyany_homepage_services_mini">
                <action method="setBlockId"><block_id>jollyany_homepage_services_mini</block_id></action>
            </block>
            <block type="cms/block" name="homepage_slide">
                <action method="setBlockId"><block_id>jollyany-homepage-slider</block_id></action>
            </block>
        </reference>
<reference name="before_footer">
<remove name="home.parallax"/>
<block type="cms/block" name="jollyany_footer_testimonial">
                <action method="setBlockId"><block_id>jollyany_footer_testimonial</block_id></action>
            </block>
		</reference>
EOD;

$cmsPage = array(
	'title' => 'Jollyany Homepage 4',
	'identifier' => 'jollyany-home-4',
	'content' => $content,
	'layout_update_xml' => $layout,
	'is_active' => 1,
	'stores' => array(0),
	'root_template' => 'one_column'
);
$page = Mage::getModel('cms/page')->load('jollyany-home-4');

if (!$page->getId()) {
	Mage::getModel('cms/page')->setData($cmsPage)->save();
} else {
	$page->setContent($content)
		->save();
}

// Create About Me Page
$content = <<<EOD
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="widget">
<h3>WELCOME, I AM CARMEN</h3>
<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringill torquent per conubia nostra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
<p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringill torquent per conubia nostra.</p>
<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringill torquent per conubia nostra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="widget margin-top">
<div id="aboutslider" class="flexslider clearfix">
<ul class="slides">
<li><img class="img-responsive" src="{{media url="wysiwyg/about_mini_01.jpg"}}" alt="" /></li>
<li><img class="img-responsive" src="{{media url="wysiwyg/about_mini_03.jpg"}}" alt="" /></li>
</ul>
<div class="aboutslider-shadow"><span class="s1">&nbsp;</span></div>
</div>
</div>
</div>
</div>
<div class="white-wrapper">
<div class="general-title padding-top">
<h2>My Design &amp; Development Offers</h2>
<hr /></div>
<div class="row">
<div class="services-one padding-top text-center">
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 first">
<div class="servicebox">
<div class="service-icon-circle border-none make-bg"><em class="fa fa-lightbulb-o">&nbsp;</em></div>
<div class="title">
<h3>Superb Design Layout</h3>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod enim a metus adipiscing aliquam. Vestibulum in vestibulum lorem.</p>
<a class="readmore" href="#">Read more...</a></div>
</div>
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
<div class="servicebox">
<div class="service-icon-circle border-none make-bg"><em class="fa fa-laptop">&nbsp;</em></div>
<div class="title">
<h3>Dark &amp; Drop Builder</h3>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod enim a metus adipiscing aliquam. Vestibulum in vestibulum lorem.</p>
<a class="readmore" href="#">Read more...</a></div>
</div>
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
<div class="servicebox">
<div class="service-icon-circle border-none make-bg"><em class="fa fa-headphones">&nbsp;</em></div>
<div class="title">
<h3>Retina Graphic Display</h3>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod enim a metus adipiscing aliquam. Vestibulum in vestibulum lorem.</p>
<a class="readmore" href="#">Read more...</a></div>
</div>
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 last">
<div class="servicebox">
<div class="service-icon-circle border-none make-bg"><em class="fa fa-bars">&nbsp;</em></div>
<div class="title">
<h3>Responsive Layout Design</h3>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod enim a metus adipiscing aliquam. Vestibulum in vestibulum lorem.</p>
<a class="readmore" href="#">Read more...</a></div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="https://raw.githubusercontent.com/woothemes/FlexSlider/master/jquery.flexslider.js"></script>
<script type="text/javascript">// <![CDATA[
        jQuery(window).load(function() {
            jQuery('#aboutslider').flexslider({
                animation: "fade",
                controlNav: true,
                animationLoop: true,
                slideshow: true,
                sync: "#carousel"
            });
        });
// ]]></script>
EOD;

$cmsPage = array(
	'title' => 'Jollyany About Me',
	'identifier' => 'jollyany-about-me',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0),
	'content_heading' => 'Carmen (Single About Page)',
	'root_template' => 'one_column'
);
$page = Mage::getModel('cms/page')->load('jollyany-about-me');

if (!$page->getId()) {
	Mage::getModel('cms/page')->setData($cmsPage)->save();
} else {
	$page->setContent($content)
		->save();
}

// Create FAQs Page
$content = <<<EOD
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="widget">
<h3>FREQUENTLY ASKED QUESTIONS</h3>
<div class="about_tabbed">
<div id="accordion2" class="panel-group">
<div class="panel panel-default">
<div class="panel-heading active">
<h4 class="panel-title"><a class="accordion-toggle" href="#collapseOne" data-toggle="collapse" data-parent="#accordion2">Why Jollyany superb for your business?</a></h4>
</div>
<div id="collapseOne" class="panel-collapse collapse in">
<div class="panel-body">
<p>Nam sem ligula, fringilla id pulvinar eu, laoreet at ligula. Donec blandit ligula a cursus tempor. Ut sit amet nibh nulla. Quisque nec augue eget mi sodales posuere. Integer vitae vehicula mi. Mauris orci velit, tempor ut sem vel, placerat mattis orci. Curabitur lacinia ac sapien ullamcorper fermentum. Nunc interdum, dui eget facilisis convallis.</p>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion2">Total how much page template?</a></h4>
</div>
<div id="collapseTwo" class="panel-collapse collapse">
<div class="panel-body">
<p>Nam sem ligula, fringilla id pulvinar eu, laoreet at ligula. Donec blandit ligula a cursus tempor. Ut sit amet nibh nulla. Quisque nec augue eget mi sodales posuere. Integer vitae vehicula mi. Mauris orci velit, tempor ut sem vel, placerat mattis orci. Curabitur lacinia ac sapien ullamcorper fermentum. Nunc interdum, dui eget facilisis convallis.</p>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" href="#collapseThree" data-toggle="collapse" data-parent="#accordion2">How to change color schemes?</a></h4>
</div>
<div id="collapseThree" class="panel-collapse collapse">
<div class="panel-body">
<p>Nam sem ligula, fringilla id pulvinar eu, laoreet at ligula. Donec blandit ligula a cursus tempor. Ut sit amet nibh nulla. Quisque nec augue eget mi sodales posuere. Integer vitae vehicula mi. Mauris orci velit, tempor ut sem vel, placerat mattis orci. Curabitur lacinia ac sapien ullamcorper fermentum. Nunc interdum, dui eget facilisis convallis.</p>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" href="#collapseFour" data-toggle="collapse" data-parent="#accordion2">How to setup homepage?</a></h4>
</div>
<div id="collapseFour" class="panel-collapse collapse">
<div class="panel-body">
<p>Nam sem ligula, fringilla id pulvinar eu, laoreet at ligula. Donec blandit ligula a cursus tempor. Ut sit amet nibh nulla. Quisque nec augue eget mi sodales posuere. Integer vitae vehicula mi. Mauris orci velit, tempor ut sem vel, placerat mattis orci. Curabitur lacinia ac sapien ullamcorper fermentum. Nunc interdum, dui eget facilisis convallis.</p>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" href="#collapseFive" data-toggle="collapse" data-parent="#accordion2">How much this awesome theme?</a></h4>
</div>
<div id="collapseFive" class="panel-collapse collapse">
<div class="panel-body">
<p>Nam sem ligula, fringilla id pulvinar eu, laoreet at ligula. Donec blandit ligula a cursus tempor. Ut sit amet nibh nulla. Quisque nec augue eget mi sodales posuere. Integer vitae vehicula mi. Mauris orci velit, tempor ut sem vel, placerat mattis orci. Curabitur lacinia ac sapien ullamcorper fermentum. Nunc interdum, dui eget facilisis convallis.</p>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" href="#collapseSix" data-toggle="collapse" data-parent="#accordion2">Is this theme lifetime support?</a></h4>
</div>
<div id="collapseSix" class="panel-collapse collapse">
<div class="panel-body">
<p>Nam sem ligula, fringilla id pulvinar eu, laoreet at ligula. Donec blandit ligula a cursus tempor. Ut sit amet nibh nulla. Quisque nec augue eget mi sodales posuere. Integer vitae vehicula mi. Mauris orci velit, tempor ut sem vel, placerat mattis orci. Curabitur lacinia ac sapien ullamcorper fermentum. Nunc interdum, dui eget facilisis convallis.</p>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion2">31 homepage layout template only one price?</a></h4>
</div>
<div id="collapseSeven" class="panel-collapse collapse">
<div class="panel-body">
<p>Nam sem ligula, fringilla id pulvinar eu, laoreet at ligula. Donec blandit ligula a cursus tempor. Ut sit amet nibh nulla. Quisque nec augue eget mi sodales posuere. Integer vitae vehicula mi. Mauris orci velit, tempor ut sem vel, placerat mattis orci. Curabitur lacinia ac sapien ullamcorper fermentum. Nunc interdum, dui eget facilisis convallis.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
EOD;

$cmsPage = array(
	'title' => 'Jollyany FAQs',
	'identifier' => 'jollyany-faqs',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0),
	'content_heading' => 'FAQs',
	'root_template' => 'one_column'
);
$page = Mage::getModel('cms/page')->load('jollyany-faqs');

if (!$page->getId()) {
	Mage::getModel('cms/page')->setData($cmsPage)->save();
} else {
	$page->setContent($content)
		->save();
}

// Create Not Found Page
$content = <<<EOD
<div class="not_found text-center">
<h1>404!</h1>
<p class="lead">Look like something went wrong! The page you were looking for is not here. <br /> Go <a href="#"> Home </a> or try a search.</p>
</div>
EOD;

$cmsPage = array(
	'title' => 'Jollyany 404 Not Found',
	'identifier' => 'jollyany-not-found',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0),
	'root_template' => 'one_column'
);
$page = Mage::getModel('cms/page')->load('jollyany-not-found');

if (!$page->getId()) {
	Mage::getModel('cms/page')->setData($cmsPage)->save();
} else {
	$page->setContent($content)
		->save();
}

// Create Services Page
$content = <<<EOD
<div class="general-title">
<h2>What We Do?</h2>
<hr />
<p class="lead">We provide best solution for your business</p>
</div>
<div class="col-lg-4 first">
<div class="service-with-image">
<div class="entry"><img class="img-responsive" src="{{media url="wysiwyg/service_01.jpg"}}" alt="" /> <span class="service-title"> <a href="#"><em class="fa fa-user"></em> About Us</a> </span></div>
<div class="service-desc">
<p>Donec id elit non mi porta gravida at eget metus. Fusce dabus, tellus ac cursus, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
<a class="readmore" href="#">Read More...</a></div>
</div>
</div>
<div class="col-lg-4">
<div class="service-with-image">
<div class="entry"><img class="img-responsive" src="{{media url="wysiwyg/service_02.jpg"}}" alt="" /> <span class="service-title"> <a href="#"><em class="fa fa-lightbulb-o"></em> Services</a> </span></div>
<div class="service-desc">
<p>Donec id elit non mi porta gravida at eget metus. Fusce dabus, tellus ac cursus, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
<a class="readmore" href="#">Read More...</a></div>
</div>
</div>
<div class="col-lg-4 last">
<div class="service-with-image">
<div class="entry"><img class="img-responsive" src="{{media url="wysiwyg/service_01.jpg"}}" alt="" /> <span class="service-title"> <a href="#"><em class="fa fa-magic"></em> Hire Us</a> </span></div>
<div class="service-desc">
<p>Donec id elit non mi porta gravida at eget metus. Fusce dabus, tellus ac cursus, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
<a class="readmore" href="#">Read More...</a></div>
</div>
</div>
<div class="grey-wrapper jt-shadow">
<div class="general-title">
<h2>Our Working Process</h2>
<hr />
<p class="lead">These is the team behind Jollyany Agency</p>
</div>
<div class="custom-services">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 first">
<div class="ch-item">
<div class="ch-info-wrap">
<div class="ch-info">
<div class="ch-info-front"><em class="fa fa-print fa-4x">&nbsp;</em>
<h3>Print Ready</h3>
</div>
<div class="ch-info-back">
<h3>RESULTS</h3>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="ch-item">
<div class="ch-info-wrap">
<div class="ch-info">
<div class="ch-info-front"><em class="fa fa-lightbulb-o fa-4x">&nbsp;</em>
<h3>Planning</h3>
</div>
<div class="ch-info-back">
<h3>RESULTS</h3>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="ch-item">
<div class="ch-info-wrap">
<div class="ch-info">
<div class="ch-info-front"><em class="fa fa-bar-chart-o fa-4x">&nbsp;</em>
<h3>Built with care</h3>
</div>
<div class="ch-info-back">
<h3>RESULTS</h3>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 last">
<div class="ch-item">
<div class="ch-info-wrap">
<div class="ch-info">
<div class="ch-info-front"><em class="fa fa-html5 fa-4x">&nbsp;</em>
<h3>Clean and Simple</h3>
</div>
<div class="ch-info-back">
<h3>RESULTS</h3>
<p>Lorem ipsum dolor sit ameconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
<div class="widget padding-top">
<h3>WHY <span>JOLLYANY</span> IS SIMPLE &amp; VERY POWERFUL?</h3>
<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros.</p>
<br />
<div id="accordion-first" class="clearfix">
<div id="accordion2" class="accordion">
<div class="accordion-group">
<div class="accordion-heading"><a class="accordion-toggle" href="#collapseSix" data-toggle="collapse" data-parent="#accordion2"> <em class="fa fa-plus icon-fixed-width"></em>Jollyany is fully responsive and perfectly fits on any Mobile device. </a></div>
<div id="collapseSix" class="accordion-body collapse">
<div class="accordion-inner">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor...</div>
</div>
</div>
<div class="accordion-group">
<div class="accordion-heading"><a class="accordion-toggle" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion2"> <em class="fa fa-plus icon-fixed-width"></em>Jollyany is automatically creates retina ready images. </a></div>
<div id="collapseSeven" class="accordion-body collapse">
<div class="accordion-inner">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor...</div>
</div>
</div>
<div class="accordion-group">
<div class="accordion-heading"><a class="accordion-toggle" href="#collapseTen" data-toggle="collapse" data-parent="#accordion2"> <em class="fa fa-plus icon-fixed-width"></em>Jollyany is unlimited color schemes </a></div>
<div id="collapseTen" class="accordion-body collapse">
<div class="accordion-inner">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor...</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
<div class="wow fadeInRight margin-top"><img src="{{media url="wysiwyg/iphone_01.png"}}" alt="" width="100%" /></div>
</div>
EOD;

$cmsPage = array(
	'title' => 'Jollyany Services',
	'identifier' => 'jollyany-services',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0),
	'content_heading' => 'Services',
	'root_template' => 'one_column'
);
$page = Mage::getModel('cms/page')->load('jollyany-services');

if (!$page->getId()) {
	Mage::getModel('cms/page')->setData($cmsPage)->save();
} else {
	$page->setContent($content)
		->save();
}

// Create Testimonials Page
$content = <<<EOD
<div class="general-title">
<h2>What they say about Jollyany?</h2>
<hr />
<p class="lead">Thanks for our awesome clients &amp; testimonials</p>
</div>
<div class="padding-top text-center">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="team_member testimonial_widget first">
<div class="entry"><img class="img-responsive" src="{{media url="wysiwyg/01_testimonial.jpg"}}" alt="" /></div>
<h3>Mark Motra <span>|</span> <small>google.com</small></h3>
<p>Cras dapibus. Vivamus elementum semper Aenean vulputate eleifend tellus. Lorem ipsum dolar sit amet Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat...</p>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="team_member testimonial_widget">
<div class="entry"><img class="img-responsive" src="{{media url="wysiwyg/02_testimonial.jpg"}}" alt="" /></div>
<h3>Luke Backer <span>|</span> <small>yahoo.com</small></h3>
<p>Cras dapibus. Vivamus elementum semper Aenean vulputate Aenean vulputate eleifend tellus. eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae...</p>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="team_member testimonial_widget">
<div class="entry"><img class="img-responsive" src="{{media url="wysiwyg/03_testimonial.jpg"}}" alt="" /></div>
<h3>Jenny DEO <span>|</span> <small>envato.com</small></h3>
<p>Cras dapibus. Vivamus elementum semper Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae...</p>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="team_member testimonial_widget last">
<div class="entry"><img class="img-responsive" src="{{media url="wysiwyg/04_testimonial.jpg"}}" alt="" /></div>
<h3>Amanda DEO <span>|</span> <small>bing.com</small></h3>
<p>Cras dapibus. Vivamus elementum semper Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat Aenean vulputate eleifend tellus. vitae...</p>
</div>
</div>
</div>
<div class="padding-top clearer">
<div class="general-title">
<h2>What they say about Jollyany?</h2>
<hr />
<p class="lead">Thanks for our awesome clients &amp; testimonials</p>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  padding-top">
<div class="widget">
<div id="owl-testimonial-widget" class="owl-carousel">
<div class="testimonial-carousel text-center">
<div class="testimonial-wrap">
<p class="lead">"Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero"</p>
</div>
<div class="media"><img class="img-circle img-responsive" src="{{media url="wysiwyg/client_01.jpg"}}" alt="" /></div>
<div class="testimonial-names">
<h3>Filiz OZER</h3>
<a class="readmore" href="#">C0-Founder (JollyThemes)</a></div>
</div>
<div class="testimonial-carousel text-center">
<div class="testimonial-wrap">
<p class="lead">"Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh."</p>
</div>
<div class="media"><img class="img-circle img-responsive" src="{{media url="wysiwyg/client_01.jpg"}}" alt="" /></div>
<div class="testimonial-names">
<h3>Filiz OZER</h3>
<a class="readmore" href="#">C0-Founder (JollyThemes)</a></div>
</div>
</div>
</div>
</div>
</div>
EOD;

$cmsPage = array(
	'title' => 'Jollyany Testimonials',
	'identifier' => 'jollyany-testimonials',
	'content' => $content,
	'is_active' => 1,
	'stores' => array(0),
	'content_heading' => 'Testimonials',
	'root_template' => 'one_column'
);
$page = Mage::getModel('cms/page')->load('jollyany-testimonials');

if (!$page->getId()) {
	Mage::getModel('cms/page')->setData($cmsPage)->save();
} else {
	$page->setContent($content)
		->save();
}

$installer->endSetup();