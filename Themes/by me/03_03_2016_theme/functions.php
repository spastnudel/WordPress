<?php
set_theme_mod('background_color','lime');
set_theme_mod('admin','bruce');

add_action('customize_register','create_customizer');
add_action('after_setup_theme','add_top_menu');

function add_top_menu()
{
	register_nav_menu('top_menu',__('Top Menu'));
}

function create_customizer($wp_customize)
{
		$wp_customize->add_setting('marketing_line_setting',
			array(
				'default'		=>	'',
				'transport'	 =>	'refresh',
			)
		);

		$wp_customize->add_setting('section2_id',
			array(
				'default'	 =>		0,
				'transport'	 =>	'refresh'
			)
		);

		$wp_customize->add_setting('bg1_image',
			array(
				'transport'	 =>	'refresh',
				'default'		=>	'http://localhost/wordpress/wp-content/uploads/2015/09/0101-300x188.jpg',
			)
		);


		$wp_customize->add_setting('bg2_image',
			array(
				'transport'	 =>	'refresh',
				'default'		=>	'http://localhost/wordpress/wp-content/uploads/2015/09/0202-300x169.jpg',
			)
		);


		$wp_customize->add_setting('bg3_image',
			array(
				'transport'	 =>	'refresh',
				'default'		=>	'http://localhost/wordpress/wp-content/uploads/2015/09/04-300x133.jpg',
			)
		);

		$wp_customize->add_section('marketing',
			array(
				'title'			=>	__('Marketing','hwi-tb'),
				'priority'	=>	10,
			)
		);

		$wp_customize->add_section('page_sections',
			array(
				'title'			=>	__('Page Sections'),
				'priority'	=>	5
			)
		);

		$wp_customize->add_section('page_backgrounds',
			array(
				'title'			=>	__('Page Backgrounds'),
				'priority'	=>	25
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'marketing_line', array(
			'label'        => __( 'Marketing Line', 'hwi-tb' ),
			'section'    => 'marketing',
			'settings'   => 'marketing_line_setting',
		) ) );

					$page_titles = array();

					$args = array(
						'post_type'				=>	'page',
						'orderby'					=>	'title',
						'order'						=>	'ASC'
					);

					$the_query = new WP_Query( $args );

					// The Loop
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							$page_titles[get_the_ID()] = get_the_title();
						}
					} else {
							$page_titles['none'] = "Please create a page.";
					}
					/* Restore original Post Data */
					wp_reset_postdata();



		$wp_customize->add_control('section2_page_select',
			array(
				'label'	 =>	__('Select A Page','hwi-tb'),
				'section'=>	'page_sections',
				'settings'	 =>	'section2_id',
				'type'	=>	'select',
				'choices' =>	$page_titles
			)

		);

		$wp_customize->add_control( 
			new WP_Customize_Upload_Control($wp_customize, 'bg1', 
				array(
				'label'      => __( 'Top Background Image', 'hwi-tb' ),
				'section'    => 'page_backgrounds',
				'settings'   => 'bg1_image',
			) ) 
		);		

		$wp_customize->add_control( 
			new WP_Customize_Upload_Control($wp_customize, 'bg2', 
				array(
				'label'      => __( 'Middle Background Image', 'hwi-tb' ),
				'section'    => 'page_backgrounds',
				'settings'   => 'bg2_image',
			) ) 
		);		

		$wp_customize->add_control( 
			new WP_Customize_Upload_Control($wp_customize, 'bg3', 
				array(
				'label'      => __( 'Bottom Background Image', 'hwi-tb' ),
				'section'    => 'page_backgrounds',
				'settings'   => 'bg3_image',
			) ) 
		);		

/*
http://localhost/wordpress/wp-content/uploads/2015/09/0101-300x188.jpg
*/


}


function login_form()
{
	$html = ('
			Username<br/><input><p/>
			Password<br/><input type="password"><p/>
			<input type="submit" value="Log In" style="background:#F90;" />
			');

	return $html;
}

?>