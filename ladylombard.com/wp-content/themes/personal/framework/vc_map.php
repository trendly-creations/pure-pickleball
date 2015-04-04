<?php
vc_map(array(
    "name" 		=>	__("Blog Carousel", SH_NAME),
    "base" 		=>	"sh_blog_carousel",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_carousel.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Modern Carousel", SH_NAME),
    "base" 		=>	"sh_modern_carousel",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/modern_carousel.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Latest Posts", SH_NAME),
    "base" 		=>	"sh_latest_posts",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/latest_posts.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Masonary Blog", SH_NAME),
    "base" 		=>	"sh_masonary_blog",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/masonery_blog.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Column:", SH_NAME),
            "param_name" 	=> 	"cols",
            "value" 		=> 	array_flip(array(
									'col-md-3'		=>	__('4 Cols', SH_NAME),
									'col-md-4'		=>	__('3 Cols', SH_NAME),
									'col-md-6'		=>	__('2 Cols', SH_NAME),
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Post Tabber", SH_NAME),
    "base" 		=>	"sh_post_tabber",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/post_tabber.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Slider", SH_NAME),
    "base" 		=>	"sh_blog_slider",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_sider.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Fancy Blog List", SH_NAME),
    "base" 		=>	"sh_fancy_blog_list",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/fancy_blog_list.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Fancy Blog List Style 2", SH_NAME),
    "base" 		=>	"sh_fancy_blog_list_2",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/fancy_blog_list.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Fancy Blog List Style 3", SH_NAME),
    "base" 		=>	"sh_fancy_blog_list_3",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/fancy_blog_list.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Fancy Blog List Style 4", SH_NAME),
    "base" 		=>	"sh_fancy_blog_list_4",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/fancy_blog_list.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Fancy Blog List Style 5", SH_NAME),
    "base" 		=>	"sh_fancy_blog_list_5",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/fancy_blog_list.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Fancy Blog List Style 6", SH_NAME),
    "base" 		=>	"sh_fancy_blog_list_6",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/fancy_blog_list.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Vertical Blog Style", SH_NAME),
    "base" 		=>	"sh_verticle_blog_style",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/verticle_blog_list.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Column:", SH_NAME),
            "param_name" 	=> 	"cols",
            "value" 		=> 	array_flip(array(
									'col-md-4'		=>	__('3 Cols', SH_NAME),
									'col-md-6'		=>	__('2 Cols', SH_NAME),
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Horizontal Blog Style", SH_NAME),
    "base" 		=>	"sh_horizontal_blog_style",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/horizontal_blog_style.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip(array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
		
    )
));

vc_map(array(
    "name" 		=>	__("Instagram Images", SH_NAME),
    "base" 		=>	"sh_instagram_images",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/instagram.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Instagram UserName:", SH_NAME),
            "param_name" 	=> 	"user",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter your instagram username.", SH_NAME)
        ),
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number of Images:", SH_NAME),
            "param_name" 	=> 	"num",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter the number of show images.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Open Links In:", SH_NAME),
            "param_name" 	=> 	"mode",
            "value" 		=> 	array(
									__('Parent', SH_NAME) 	=> 'parent',
									__('Blank', SH_NAME) 	=> 'blank'
								),
            "description" 	=> 	__("Selct the action of links opening.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Twitte Tweets", SH_NAME),
    "base" 		=>	"sh_twitter_tweets",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/twitter.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Twitter UserName:", SH_NAME),
            "param_name" 	=> 	"user",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter your Twitter username.", SH_NAME)
        ),
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number of Tweets:", SH_NAME),
            "param_name" 	=> 	"num",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter the number of Tweets.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Tags Cloud", SH_NAME),
    "base" 		=>	"sh_tags_cloud",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/tags.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"user",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter the number of show tags.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Search Box", SH_NAME),
    "base" 		=>	"sh_search_box",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/search.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Placeholder", SH_NAME),
            "param_name" 	=> 	"placeholder",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter the placeholder", SH_NAME)
        ),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array( __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Social Media", SH_NAME),
    "base" 		=>	"sh_social_media",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/social.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number of Social Icons:", SH_NAME),
            "param_name" 	=> 	"num",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter the number of show Social Icons.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Open Links In:", SH_NAME),
            "param_name" 	=> 	"mode",
            "value" 		=> 	array(
									__('Parent', SH_NAME) 	=> 'parent',
									__('Blank', SH_NAME) 	=> 'blank'
								),
            "description" 	=> 	__("Selct the action of links opening.", SH_NAME)
        ),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Contect Info Box", SH_NAME),
    "base" 		=>	"sh_contect_box",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/contact.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Email ID:", SH_NAME),
            "param_name" 	=> 	"email",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter your email id.", SH_NAME)
        ),
		array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Contact No:", SH_NAME),
            "param_name" 	=> 	"contact",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter your contact no.", SH_NAME)
        ),
		array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Date of Birth:", SH_NAME),
            "param_name" 	=> 	"dob",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter your date of birth.", SH_NAME)
        ),
		array(
            "type" 			=> 	"textarea",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Descritpion:", SH_NAME),
            "param_name" 	=> 	"desc",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter the description.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Flicker Images", SH_NAME),
    "base" 		=>	"sh_flicker_images",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/flicker.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Flicker ID:", SH_NAME),
            "param_name" 	=> 	"user",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter your Flicker ID.", SH_NAME)
        ),
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number of Images:", SH_NAME),
            "param_name" 	=> 	"num",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter the number of show images.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Open Links In:", SH_NAME),
            "param_name" 	=> 	"mode",
            "value" 		=> 	array(
									__('Parent', SH_NAME) 	=> 'parent',
									__('Blank', SH_NAME) 	=> 'blank'
								),
            "description" 	=> 	__("Selct the action of links opening.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Posts Image Carousel", SH_NAME),
    "base" 		=>	"sh_blog_post_image_carousel",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_post_image_carousel.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Testimonial", SH_NAME),
    "base" 		=>	"sh_blog_testimonial",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/testimonail.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Post Single Image Carousel", SH_NAME),
    "base" 		=>	"sh_blog_post_single_image_carousel",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/single_image_carousel.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Latest Posts Carousel", SH_NAME),
    "base" 		=>	"sh_blog_latest_post_carousel",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/latest_posts_carousel.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("FAQs", SH_NAME),
    "base" 		=>	"sh_faqs",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/faqs.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter the Number of FAQs to Show.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Our Partners", SH_NAME),
    "base" 		=>	"sh_our_partners",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/partner.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Number of Partners to Show.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Latest News Carousel", SH_NAME),
    "base" 		=>	"sh_blog_latest_news_carousel",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/news.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "value" 		=> 	"",
            "description" 	=> 	__("Enter number of posts.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Categories", SH_NAME),
    "base" 		=>	"sh_blog_categories",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/cate.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Show post counts:", SH_NAME),
            "param_name" 	=> 	"post_count",
            "value" 		=> 	array(
									__('True', SH_NAME) 	=> '1',
									__('False', SH_NAME) => '0'
								),
            "description" 	=> 	__("Show post counts.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Creative Team", SH_NAME),
    "base" 		=>	"sh_blog_creative_team",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/team.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "description" 	=> 	__("Enter the number of posts to show.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Title", SH_NAME),
			"param_name" 	=> 	"col_title",
			"description" 	=> 	__("Enter the title of this section.", SH_NAME)
		),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Enter the Sub Title", SH_NAME),
			"param_name" 	=> 	"col_sub_title",
			"description" 	=> 	__("Enter the sub title of this section. Note: this sub title only work with Modern Heading Style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Heading Style", SH_NAME),
			"param_name" 	=> 	"heading",
			"value" 		=> 	array( __( 'Heading 1', SH_NAME ) => 'heading1', __( 'Modren', SH_NAME ) => 'modren' ),
			"description" 	=> 	__("Select the heading style.", SH_NAME)
		),
		array(
			"type" 			=> 	"dropdown",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Background Style", SH_NAME),
			"param_name" 	=> 	"back_ground",
			"value" 		=> 	array(  __( 'Light', SH_NAME ) => 'light', __( 'Dark', SH_NAME ) => 'dark' ),
			"description" 	=> 	__("Select the Background style.", SH_NAME)
		),
    )
));

vc_map(array(
    "name" 		=>	__("Featured Video Gallery", SH_NAME),
    "base" 		=>	"sh_featured_video_gallery",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/featured_video_gallery.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Hover Effect:", SH_NAME),
            "param_name" 	=> 	"hover",
            "value" 		=> 	array( 'True' => 'true', 'False' => 'false' ),
            "description" 	=> 	__("Show or hide hover effect.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'gallery_category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Single Post", SH_NAME),
    "base" 		=>	"sh_blog_single_post",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_single_post.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Select Style:", SH_NAME),
            "param_name" 	=> 	"blog_style",
            "value" 		=> 	array(
									__('Fancy Blog Style 1', SH_NAME) 	=> 'fancy_blog_list',
									__('Fancy Blog Style 2', SH_NAME) 	=> '_2',
									__('Fancy Blog Style 3', SH_NAME) 	=> '_3',
									__('Fancy Blog Style 4', SH_NAME) 	=> '_4',
									__('Fancy Blog Style 5', SH_NAME) 	=> '_5',
									__('Fancy Blog Style 6', SH_NAME) 	=> '_6',
									__('Horizontal Blog Style', SH_NAME) => 'horizontal_blog_style',
									__('Verticle Blog Style', SH_NAME) 	=> 'verticle_blog_style',
								),
            "description" 	=> 	__("Select Blog Style.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
		array(
			"type" 			=> 	"textfield",
			"holder" 		=> 	"div",
			"class" 		=> 	"",
			"heading" 		=> 	__("Number:", SH_NAME),
			"param_name" 	=> 	"number",
			"description" 	=> 	__("Enter the number of posts to show.", SH_NAME)
		),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Single Post 2", SH_NAME),
    "base" 		=>	"sh_blog_single_post_2",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_single_post.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Select Style:", SH_NAME),
            "param_name" 	=> 	"blog_style",
            "value" 		=> 	array(
									__('Fancy Blog Style 1', SH_NAME) 	=> 'fancy_blog_list',
									__('Fancy Blog Style 2', SH_NAME) 	=> '_2',
									__('Fancy Blog Style 3', SH_NAME) 	=> '_3',
									__('Fancy Blog Style 4', SH_NAME) 	=> '_4',
									__('Fancy Blog Style 5', SH_NAME) 	=> '_5',
									__('Fancy Blog Style 6', SH_NAME) 	=> '_6',
									__('Horizontal Blog Style', SH_NAME) => 'horizontal_blog_style',
									__('Verticle Blog Style', SH_NAME) 	=> 'verticle_blog_style',
								),
            "description" 	=> 	__("Select Blog Style.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Select Post:", SH_NAME),
            "param_name" 	=> 	"post_id",
            "value" 		=> 	array_flip( sh_get_posts_custom( 'post' ) ),
            "description" 	=> 	__("Select the post.", SH_NAME),
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Single Gallery", SH_NAME),
    "base" 		=>	"sh_blog_single_gallery",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_single_gallery.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Select Post:", SH_NAME),
            "param_name" 	=> 	"post_id",
            "value" 		=> 	array_flip( sh_get_posts_custom( 'webinane_galleries' ) ),
            "description" 	=> 	__("Select the post.", SH_NAME),
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Hover Effect:", SH_NAME),
            "param_name" 	=> 	"hover",
            "value" 		=> 	array( 'True' => 'true', 'False' => 'false' ),
            "description" 	=> 	__("Show or hide hover effect.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Boxed Video Gallery", SH_NAME),
    "base" 		=>	"sh_boxed_video_gallery",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/boxed_video_gallery.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Hover Effect:", SH_NAME),
            "param_name" 	=> 	"hover",
            "value" 		=> 	array( 'True' => 'true', 'False' => 'false' ),
            "description" 	=> 	__("Show or hide hover effect.", SH_NAME)
        ),
		array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "description" 	=> 	__("Enter the number to show galleries.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'gallery_category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Gallery Style 1", SH_NAME),
    "base" 		=>	"sh_blog_gallery_style_3",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_gallery_styles.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
		array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "description" 	=> 	__("Enter the number to show galleries.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'gallery_category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Gallery Style 2", SH_NAME),
    "base" 		=>	"sh_blog_gallery_style_4",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_gallery_styles.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
		array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "description" 	=> 	__("Enter the number to show galleries.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'gallery_category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Gallery Style 3", SH_NAME),
    "base" 		=>	"sh_blog_gallery_style_5",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_gallery_styles.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
		array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "description" 	=> 	__("Enter the number to show galleries.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'gallery_category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

vc_map(array(
    "name" 		=>	__("Blog Gallery Style 4", SH_NAME),
    "base" 		=>	"sh_blog_gallery_style_6",
    "class" 	=>	"",
	"icon" 		=> 	get_template_directory_uri(). "/images/vc/blog_gallery_styles.png",
    "category" 	=> 	__('Personal', SH_NAME),
    "params" 	=> 	array(
		array(
            "type" 			=> 	"textfield",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Number:", SH_NAME),
            "param_name" 	=> 	"number",
            "description" 	=> 	__("Enter the number to show galleries.", SH_NAME)
        ),
		array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=>	 "",
            "heading" 		=>	 __("Category", SH_NAME),
            "param_name" 	=>	 "cat",
            "value" 		=> 	array_flip( sh_get_categories( array( 'taxonomy' => 'gallery_category', 'hide_empty' => false ) ) ),
            "description" 	=>	 __("Select the category.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sort By:", SH_NAME),
            "param_name" 	=> 	"sort_by",
            "value" 		=> 	array_flip( array(
									'date'			=>	__('Date', SH_NAME),
									'title'			=>	__('Title', SH_NAME),
									'name'			=>	__('Name', SH_NAME),
									'author'		=>	__('Author', SH_NAME),
									'comment_count' =>	__('Comment Count', SH_NAME),
									'random' 		=>	__('Random', SH_NAME)
									)
								),
            "description" 	=> 	__("Choose Sorting by.", SH_NAME)
        ),
        array(
            "type" 			=> 	"dropdown",
            "holder" 		=> 	"div",
            "class" 		=> 	"",
            "heading" 		=> 	__("Sorting Order:", SH_NAME),
            "param_name" 	=> 	"sorting_order",
            "value" 		=> 	array(
									__('Ascending Order', SH_NAME) 	=> 'ASC',
									__('Descending Order', SH_NAME) => 'DESC'
								),
            "description" 	=> 	__("Choose Sorting Order.", SH_NAME)
        ),
    )
));

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) 
{
    class WPBakeryShortCode_sh_txt_slider_block extends WPBakeryShortCodesContainer{}
}
if ( class_exists( 'WPBakeryShortCode' ) )
{
    class WPBakeryShortCode_sh_slides extends WPBakeryShortCode{}
}
function sh_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag)
{
    // echo $class_string." | ".$tag."<br />";
    if ($tag == 'vc_row' || $tag == 'vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', 'row-fluid', $class_string);
    }
    if ($tag == 'vc_column' || $tag == 'vc_column_inner') {
       $class_string = str_replace('vc_col-sm-1', 'col-md-1', $class_string);
			$class_string = str_replace('vc_col-sm-2', 'col-md-2', $class_string);
			$class_string = str_replace('vc_col-sm-3', 'col-md-3', $class_string);
			$class_string = str_replace('vc_col-sm-4', 'col-md-4', $class_string);
			$class_string = str_replace('vc_col-sm-5', 'col-md-5', $class_string);
			$class_string = str_replace('vc_col-sm-6', 'col-md-6', $class_string);
			$class_string = str_replace('vc_col-sm-7', 'col-md-7', $class_string);
			$class_string = str_replace('vc_col-sm-8', 'col-md-8', $class_string);
			$class_string = str_replace('vc_col-sm-9', 'col-md-9', $class_string);
			$class_string = str_replace('vc_col-sm-10', 'col-md-10', $class_string);
			$class_string = str_replace('vc_col-sm-11', 'col-md-11', $class_string);
			$class_string = str_replace('vc_col-sm-12', 'col-md-12', $class_string);
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'sh_custom_css_classes_for_vc_row_and_vc_column', 10, 2);
function vc_theme_vc_row($atts, $content = null)
{
    extract(shortcode_atts(array(
        'el_class' 			=> '',
        'bg_image' 			=> '',
        'bg_color' 			=> '',
        'bg_image_repeat' 	=> '',
        'font_color' 		=> '',
        'posts_grid' 		=> '',
        'padding' 			=> '',
        'margin_bottom' 	=> '',
        'container' 		=> '',
        'gap' 				=> '',
        'col_title' 		=> '',
		'remove_padding' 	=> '',
    ), $atts));
    $atts['base'] = '';
	
    wp_enqueue_style('js_composer_front');
    wp_enqueue_script('wpb_composer_front_js');
    wp_enqueue_style('js_composer_custom_css');
		
    $vc_row = new WPBakeryShortCode_VC_Row($atts);
    $el_class = $vc_row->getExtraClass($el_class);
    $output = '';
    $css_class = $el_class;
    $style = $vc_row->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);
    $output = '<section class="block ' . $css_class . ' '. $remove_padding .' ';
    if ($gap == 'remove-gap'):
        $add_class = $gap . ' ';
    else:
        $add_class = '';
    endif;
    $output .= $add_class;
    $output .= '">';
    $output .= '<div class="container">';
    $output .= '<div class="row">';
    if  ( $col_title ):
		$exp = explode( ' ', $col_title, 2 );
			$output .= '<div class="col-md-12"><div class="heading1"><h1><i class="fa fa-pencil"></i><strong>' . sh_set( $exp, '0' ) . '</strong>&nbsp;' . sh_set( $exp, '1' ) . '</h1></div></div>';    endif;
    $output .= wpb_js_remove_wpautop($content);
	$output .= '</div></div></section>';
    return $output;
}
function vc_theme_vc_column($atts, $content = null)
{
    extract(shortcode_atts(array(
        'width' 		=> '1/1',
        'el_class' 		=> '',
		'back_ground'	=> '',
		'top_margin' 	=> '',
    ), $atts));
    $width = wpb_translateColumnWidthToSpan($width);
    $width = str_replace( 'vc_col-sm-', 'col-md-', $width .' column' );
    $el_class = ($el_class) ? ' ' . $el_class : '';
	
    $output = '<div class="' . $width . '  '. $el_class .'">';
	if( $top_margin )
	{
		$output .= '<div class="'.$top_margin.'">';;
	}
    $output .= do_shortcode($content);
	if( $top_margin ) { $output .= '</div>'; }
    $output .= '</div>';
    return $output;
}
$top_margin = array(
    "type" 			=> 	"dropdown",
    "holder" 		=>	"div",
    "class" 		=> 	"",
    "heading" 		=> 	__("Remove Top Margin", SH_NAME),
    "param_name" 	=> 	"top_margin",
    "value" 		=> 	array(
							'True' 		=> 'top-margin',
							'False' 	=> '',							
						),
    "description" 	=> 	__("Remove the top margin of this row.", SH_NAME)
);
$param = array(
    "type" 			=> 	"dropdown",
    "holder" 		=>	"div",
    "class" 		=> 	"",
    "heading" 		=> 	__("Remove Gape", SH_NAME),
    "param_name" 	=> 	"gap",
    "value" 		=> 	array(
							'False' 	=> '',
							'True' 		=> 'remove-gap'
						),
    "description" 	=> 	__("Remove the Gap from top of the Section.", SH_NAME)
);
$padding = array(
    "type" 			=> 	"dropdown",
    "holder" 		=> 	"div",
    "class" 		=> 	"",
    "heading" 		=> 	__("Remove Padding", SH_NAME),
    "param_name" 	=> 	"remove_padding",
    "value" 		=> 	array(
							'False' 	=> '',
							'True' 		=> 'no-padding'
						),
    "description" 	=> 	__("Remove the Gap from top and bottom of the Section.", SH_NAME)
);
$title = array(
    "type" 			=> 	"textfield",
    "holder" 		=> 	"div",
    "class" 		=> 	"",
    "heading" 		=> 	__("Enter the Title", SH_NAME),
    "param_name" 	=> 	"col_title",
    "description" 	=> 	__("Enter the title of this section.", SH_NAME)
);
vc_add_param('vc_column', $top_margin);

vc_add_param('vc_row', $title);
vc_add_param('vc_row', $param);
vc_add_param('vc_row', $padding);
