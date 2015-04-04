<?php
sh_custom_header();
$theme_options = get_option(SH_NAME.'_theme_options');
?>

<section class="block">
    <div class="container">
        <div class="white-box">
            <div class="error-sec">
                <h1><?php echo sh_set( $theme_options, '404_heading' )?><i>!</i></h1>
                <h2><?php echo sh_set( $theme_options, '404_sub_title' )?></h2>
                <h3><?php echo sh_set( $theme_options, '404_desc' )?></h3>
                <ul>
                    <li><a href="<?php echo home_url()?>" title="">Home</a></li>
                    <li><a href="<?php echo sah_tpl_page('tpl-contact.php')?>" title="">Contact Us</a></li>
                </ul>
            </div><!-- Error Sec -->
        </div>
    </div>
</section>

<?php get_footer() ?>