   <div id="tf-section6" class="text-center">
        <div class="container">

            <div class="row">
        
		<?php

			$sidebar_post = 128;

			$additional_services = get_post($sidebar_post);
		?>
					


                    <div class="section-title center">
                        <h2><strong><?php echo $additional_services->post_title; ?></strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        <small><em><?php echo $additional_services->post_content; ?></em></small>            
                    </div>
 <div class="row">
 
				<?php

				$args = array(
					'post_parent'		=>	$sidebar_post,
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
								 <div class="col-md-4">
								  <div class="phone"><i>'.$sec_title.'</i></div>
								 <i class="fa">'.$sec_content.'</i>
								 </div>
						');
					}
				}

				?>
 </div>
                </div>
            </div>

        </div>