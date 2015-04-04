<?php
sh_custom_header(); 
$cont_tpl = sah_tpl_page('tpl-contact.php');
while( have_posts() ): the_post();
$settings  = get_post_meta(get_the_ID(), 'sh_profile_meta', true );
$contact = sh_set( sh_set( $settings, 'sh_contact_options'), '0' );
$tem  = explode( '.', sh_set( $settings, 'sh_po_img' ) );
$ext = array_pop( $tem );
$val = implode( '.', $tem );
?>
<section class="block no-padding">
    <div class="layer">
        <div class="fixed-img" style="background:url('<?php echo sh_set( $settings, 'sh_po_bg' )?>') no-repeat scroll 0 0 / 100% 100% rgba(0, 0, 0, 0)"></div>
        <div class="profile-author">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo sh_set( $settings, 'sh_po_img' );?>" alt="" />
                </div>
                <div class="col-md-8">
                    <div class="author-info-box">
                        <h1><?php _e( 'I\'M', SH_NAME ); echo '&nbsp;'; the_title();?></h1>
                        <span><?php echo sh_set( $settings, 'sh_po_short_desc' );?></span>
                        <i class="fa fa-pencil"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="block">
    <div class="container">
        <div class="row">
        <?php if( sh_set( $contact, 'pro_show_contact' ) == 1 ): $col = 'col-md-8'; else: $col = 'col-md-12'; endif;?>
            <div class="<?php echo $col;?>">
                <div class="about-author">
                    <h4 class="sidebar-title"><span><?php echo sh_set( $settings, 'sh_po_sub_title' );?></span><i><?php echo sh_set( $settings, 'sh_po_title' );?> </i></h4>
                    <p><?php echo sh_set( $settings, 'sh_po_desc' );?></p>
                    <?php if(sh_set( $settings, 'sh_po_resume' )): ?><a href="<?php echo sh_set( $settings, 'sh_po_resume' );?>" target="_blank" title="" class="large-btn"><?php _e( 'Download Printable Resume', SH_NAME ) ?></a><?php endif; ?>
                </div>
            </div>
            <?php if( sh_set( $contact, 'pro_show_contact' ) == 1 ):?>
            <div class="col-md-4">
                <div class="contact-info">
                    <h4 class="sidebar-title"><span><?php echo sh_set( $contact, 'pro_cont_sub_title' );?></span><i><?php echo sh_set( $contact, 'pro_cont_title' );?> </i></h4>
                    <ul>
                        <?php if(sh_set( $contact, 'pro_cont_name' )): ?><li><i class="fa fa-user"></i> <strong><?php _e( 'Name:', SH_NAME )?></strong> <?php echo sh_set( $contact, 'pro_cont_name' ); ?></li><?php endif; ?>
                        <?php if(sh_set( $contact, 'pro_cont_email' )): ?><li><i class="fa fa-envelope"></i> <strong><?php _e( 'Email:', SH_NAME )?></strong> <?php echo sh_set( $contact, 'pro_cont_email' ); ?></li><?php endif; ?>
                        <?php if(sh_set( $contact, 'pro_cont_phone' )): ?><li><i class="fa fa-phone"></i> <strong><?php _e( 'Phone:', SH_NAME )?></strong> <?php echo sh_set( $contact, 'pro_cont_phone' ); ?></li><?php endif; ?>
                        <?php if(sh_set( $contact, 'pro_cont_dob' )): ?><li><i class="fa fa-clock-o"></i> <strong><?php _e( 'Date of Birth:', SH_NAME )?></strong> <?php echo sh_set( $contact, 'pro_cont_dob' ); ?></li><?php endif; ?>
                        <?php if(sh_set( $contact, 'pro_cont_address' )): ?><li><i class="fa fa-home"></i> <strong><?php _e( 'Address:', SH_NAME )?></strong> <?php echo strip_tags(sh_set( $contact, 'pro_cont_address' )); ?></li><?php endif; ?>
                    </ul>
                    <a href="<?php echo $cont_tpl?>" title="" class="large-btn"><?php _e( 'Contact Here', SH_NAME ) ?></a>
                </div>	
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="block">
    <div class="layer">
        <div class="fixed-img" style="background:url('<?php echo sh_set( $settings, 'sh_pro_bg' )?>') no-repeat scroll 0 0 / 100% 100% rgba(0, 0, 0, 0)"></div>
        <div class="container">
            <h4 class="sidebar-title"><span><?php echo sh_set( $settings, 'sh_pro_sub_title' );?></span><i><?php echo sh_set( $settings, 'sh_pro_title' );?> </i></h4>
            <div class="top-margin">
                <div class="row">
                	<?php
                    	$skills = sh_set( $settings, 'sh_po_skills');
						foreach( $skills as $skill ):
					?>
                    <div class="col-md-3">
                        <div class="author-skills">
                            <span><?php echo sh_set( $skill, 'sh_op_skill_percent' );?>%</span>
                            <i><?php echo sh_set( $skill, 'sh_po_skill_name' );?></i>
                            <div class="progress">
                                <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar">
                                <span class="sr-only"><?php echo sh_set( $skill, 'sh_op_skill_percent' );?>% <?php _e( 'Complete', SH_NAME )?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>                   
                </div>
            </div>
        </div>
    </div>
</section>
    
<section class="block gray">
    <div class="container">
        <h4 class="sidebar-title"><span><?php echo sh_set( $settings, 'sh_my_exp_sub_title' );?></span><i><?php echo sh_set( $settings, 'sh_my_exp_title' );?> </i></h4>
        <div class="top-margin">
            <div class="row">
            	<?php
                    	$exprience = sh_set( $settings, 'sh_po_experiences');
						foreach( $exprience as $exp ):
							$ost = strtotime(sh_set( $exp, 'sh_op_exp_start_dt' ));
							$st = date( 'Y' ,$ost );
							$oen = strtotime(sh_set( $exp, 'sh_op_exp_end_dt' ));
							$en = date( 'Y', $oen );
				?>
                <div class="col-md-6">
                    <div class="experience-sec">
                        <span><img src="<?php echo $val.'-180x180.'.$ext?>" alt="<?php the_title()?>" /></span>
                        <div class="experience">
                            <h3><?php echo sh_set( $exp, 'sh_po_exp_company_name' );?><i><?php echo sh_set( $exp, 'sh_po_exp_designation' );?></i></h3>
                            <span><?php echo $st;?> - <?php echo $en;?></span>
                            <p><?php echo sh_set( $exp, 'sh_po_exp_desc' );?></p>
                        </div>
                    </div>
                </div>
               <?php endforeach; ?>
            </div>
        </div>
    </div>
</section> 

<Section class="block">
    <div class="container">
       <h4 class="sidebar-title"><span><?php echo sh_set( $settings, 'sh_my_edu_sub_title' );?></span><i><?php echo sh_set( $settings, 'sh_my_edu_title' );?> </i></h4>
        <div class="diploma-sec">
            <div class="row">
                <div class="col-md-4">
                    <div class="diploma-tabs">
                        <ul role="tablist" class="nav nav-tabs">
                        <?php 
							$diploma = sh_set( $settings, 'sh_po_experience');
							$counter = 1;
							foreach( $diploma as $edu ):
						?>
                            <li <?php if( 1 == $counter ): echo 'class="active"'; endif ?>>
                            	<a data-toggle="tab" role="tab" href="#tab<?php echo $counter ?>">
                                	<?php if( sh_set( $edu, 'sh_po_edu_icon' ) == 1 ): ?><i class="<?php echo sh_set( $edu, 'sh_po_edu_icon_select' );?>"></i><?php endif; ?>
                                    <?php if( sh_set( $edu, 'sh_po_edu_img' ) == 1 ): ?><img src="<?php echo sh_set( $edu, 'sh_po_edu_img_up' );?>" alt="" /><?php endif; ?>
									<?php echo sh_set( $edu, 'sh_po_edu_name' );?>
                                </a>
                            </li>
                        <?php $counter++; endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content">
                    	<?php
							$counte2 = 1;
							foreach( $diploma as $edu ):
						?>
                        <div id="tab<?php echo $counte2 ?>" class="tab-pane fade <?php if( 1 == $counte2) echo' in active' ?>">
                            <div class="diploma-info">
                                <div class="block">
                                    <div class="layer">
                                        <div class="fixed-img" style="background:url('<?php echo sh_set( $settings, 'sh_my_exp_bg' )?>') no-repeat scroll 0 0 / 100% 100% rgba(0, 0, 0, 0)"></div>
                                        <div class="diploma">
                                            <h3><?php _e( 'About Diplomas', SH_NAME );?></h3>
                                            <p><?php echo sh_set( $edu, 'sh_po_edu_desc' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $counte2++; endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="block">
    <div class="container">
        <h4 class="sidebar-title"><span><?php echo sh_set( $settings, 'sh_my_proj_sub_title' );?></span><i><?php echo sh_set( $settings, 'sh_my_proj_title' );?> </i></h4>
    </div>
    <div class="project-sec">
        <div class="row">
        	<?php
				$project = sh_set( $settings, 'sh_po_all_projects');
				foreach( $project as $pro ):
			?>
            <div class="col-md-3">
                <div class="project">
                    <img src="<?php echo sh_set( $pro, 'sh_po_pro_img' );?>" alt="" />
                    <div class="title">
                        <div class="project-title">
                            <h3><a href="<?php echo sh_set( $pro, 'sh_po_pro_link' );?>" title=""><?php echo sh_set( $pro, 'sh_po_pro_title' );?></a></h3>
                            <!--<span>For Leritine</span>-->
                        </div>
                    </div>
                    <a href="<?php echo sh_set( $pro, 'sh_po_pro_link' );?>" title=""><i class="fa fa-link"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="block remove-gap">
    <div class="container">
        <h4 class="sidebar-title"><span><?php echo sh_set( $settings, 'sh_my_refer_sub_title' );?></span><i><?php echo sh_set( $settings, 'sh_my_refer_title' );?> </i></h4>
        <div class="top-margin">
            <div class="reference-sec">
                <div class="row">
                <?php
                    $reference = sh_set( $settings, 'sh_po_projects');
                    foreach( $reference as $ref ):
                ?>
                    <div class="col-md-2">
                        <a href="<?php echo sh_set( $ref, 'sh_po_ref_link' );?>" title="" class="reference"><img src="<?php echo sh_set( $ref, 'sh_po_ref_img' );?>" alt="" /></a>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
		</div>
    </div>
</section>

<section class="block no-padding">
		<div class="map-sec">
			<?php echo sh_set( $settings, 'sh_po_map' );?>
		</div>
	</section>
              
<?php endwhile; wp_reset_query(); ?>
<?php get_footer(); ?>