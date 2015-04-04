<?php /* Template Name: Visual Composer */
sh_custom_header(); 

while( have_posts() ): the_post();
	 the_content();
endwhile;

get_footer();