<?php get_header(); ?>

  <body>
    <!-- Navigation
    ==========================================-->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="index.html">The Pool of Pools</a> -->
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">

			<?php 
				
				$menu_name = 'top_menu';

				if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
					$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

					$menu_items = wp_get_nav_menu_items($menu->term_id);

					$menu_list = '';

					foreach ( (array) $menu_items as $key => $menu_item ) {
						$title		= $menu_item->title;
						$url		= $menu_item->url;
						$menu_list .= '<li><a href="' . $url . '" class="page-scroll">' . $title . '</a></li>';
					}
				} 

				echo $menu_list;

			?>



          </ul>


        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Home Page
    ==========================================-->
    <div id="tf-section1" class="text-center">
        <div class="overlay">
            <div class="content">
                <h1><strong><?php echo bloginfo('name');?></strong></h1>
                <p class="lead"><strong><?php bloginfo('description'); ?></strong></p>
				<h4><?php echo get_theme_mod('marketing_line_setting'); ?></h4>
                <a href="#tf-section2" class="fa fa-angle-down page-scroll"></a>
            </div>
        </div>
    </div>

    <!-- About Us Page
    ==========================================-->
    <div id="tf-section2">
        <div class="container">
            <div class="row">
               
			<?php

				$section2_page = get_theme_mod('section2_id');
				if($section2_page=="")
				{
					echo "Please open the Customizer to add a section to Section 2.";

				} else {

				$about = get_post($section2_page);

			
			
			?>



                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h4><?php echo $about->post_title; ?></h4>
                            <h2><?php echo get_post_meta($section2_page,'slogan',true); ?></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        
						<?php
							echo $about->post_content;
						?>

                    </div>
                </div>

				 <div class="col-md-6">
					<?php echo get_the_post_thumbnail($section2_page,array(575	,575),array('alt'=>$about->post_title,'id'=>'about-image','class'=>'tb-images'));  ?>
                </div>

				<?php } ?>

            </div>
        </div>
    </div>

    <!-- Team Page
    ==========================================-->
    <div id="tf-section3" class="text-center">
	
        <div class="overlay">
            <div class="container">
			
			
			<!-- Service Tabs -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title center">

					<?php
						$section_cat = 'video-tutorial';
						$cat = get_category_by_slug($section_cat);
						echo "<h2><strong>".$cat->name."</strong></h2>";
					?>
                    <div class="line">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">

                <ul id="myTab" class="nav nav-tabs nav-justified">
				<?php

				$args = array(
					'category_name'		=>	'video-tutorial',
					'orderby'					=>	'meta_value_num',
					'meta_key'				=>	'tab-order',
					'order'						=>	'ASC'
				);

				$tabs = new WP_Query($args);

				if($tabs->have_posts() )
				{
					while($tabs->have_posts() )
					{
						$tabs->the_post();
						$tab_name = get_post_meta(get_the_ID(),'tab-name', true);

						if($tab_name=='service-one')
						{
							$class='active';
						} else {
							$class='';
						}

						echo '<li class="'.$class.'"><a href="#'.$tab_name.'" data-toggle="tab"><i class="fa fa-anchor"></i> '.get_the_title().'</a></li>';
					}
				}

				?>
                    
                </ul>

                <div id="myTabContent" class="tab-content">

				<?php

				$args = array(
					'category_name'		=>	'video-tutorial',
					'orderby'					=>	'meta_value_num',
					'meta_key'				=>	'tab-order',
					'order'						=>	'ASC'
				);

				$tabs = new WP_Query($args);

				if($tabs->have_posts() )
				{
					while($tabs->have_posts() )
					{
						$tabs->the_post();
						$tab_title			= get_the_title();
						$tab_content	= get_the_content();
						$tab_name		= get_post_meta(get_the_ID(),'tab-name', true);

						if($tab_name=='service-one')
						{
							$class='active';
						} else {
							$class='';
						}

						echo ('
								<div class="tab-pane fade '.$class.' in" id="'.$tab_name.'">
									<h4>'.$tab_title.'</h4>
									'.$tab_content.'
								</div>
						');
					}
				}

				?>


                </div>


            </div>
        </div>
			
		   
                
            </div>
        </div>
    </div>

    <!-- Services Section
    ==========================================-->
    <div id="tf-section4" class="text-center">
        <div class="container">
            <div class="section-title center">

<?php
	$make_more_money = get_post(162);
?>

                <h2><?php echo $make_more_money->post_title;?></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <em><?php echo $make_more_money->post_content;?></strong></em>
            </div>
            <div class="space"></div>
            <div class="row">

				<?php

				$args = array(
					'post_parent'		=>	162,
					'post_type'		=>	'page',
					'orderby'			=>	'rand',
				);

				$tabs = new WP_Query($args);

				if($tabs->have_posts() )
				{
					while($tabs->have_posts() )
					{
						$tabs->the_post();
						$sec_title			= get_the_title();
						$sec_content	= get_the_content();


						echo ('
								<div class="col-md-4 col-sm-12 service">
									<i class="fa fa-bar-chart"></i>
									<h4><strong>'.$sec_title.'</strong></h4>
									<p>
									'.$sec_content.'
								</div>
						');
					}
				}

				?>
                
            </div>
        </div>
    </div>

    <!-- Clients Section
    ==========================================-->
    <div id="tf-section5" class="text-center">
        <div class="overlay">
            <div class="container">

                <div class="section-title center">
                    <h2>Member <strong>Login</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>

				<?php
					echo login_form();
				?>

            </div>
        </div>
    </div>


   

    <!-- Contact Section
    ==========================================-->
 <?php get_sidebar();?>


    </div>

<?php get_footer(); ?>
