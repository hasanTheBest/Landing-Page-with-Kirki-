<?php get_header(); ?>
 
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header class="banner-header">
							<h2 class="banner-header-title">
							<?php
								esc_html_e(get_theme_mod( 'banner_title', 'The future has landed' ),'landed');
							?>
							</h2>
							<div class="description">
							<?php
								echo apply_filters( 'the_content', get_theme_mod( 'banner_description', 'And there are no hoverboards or flying cars.<br>Just apps. Lots of mother flipping apps.' ) )
							?>
							</div>
							
						</header>
						<span class="image"><img id="banner-img" src="<?php echo esc_url(get_theme_mod( 'banner_image', get_template_directory_uri() .'/assets/images/pic01.jpg' ));?>" alt="<?php esc_attr_e('images', 'landed'); ?>" /></span>
					</div>
					<a href="#one" class="goto-next scrolly"><?php esc_html_e('Next', 'landed'); ?></a>
				</section> 

			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="<?php echo esc_url(get_theme_mod( 'section_one_image', get_template_directory_uri() .'/assets/images/pic02.jpg' ));?>" alt="<?php esc_attr_e('images 2', 'landed'); ?>" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="col-4 col-12-medium">
									<header>
										<h2><?php
								esc_html_e(get_theme_mod( 'section_one_title', 'Odio faucibus ipsum integer consequat' ),'landed');
							?></h2>
										<p><?php
								esc_html_e(get_theme_mod( 'section_one_description', 'Nascetur eu nibh vestibulum amet gravida nascetur praesent' ),'landed');
							?></p>
									</header>
								</div>
								<div class="col-4 col-12-medium lft">
									<?php
								echo apply_filters( 'the_content', get_theme_mod( 'section_one_content1', 'Morbi enim nascetur et placerat lorem sed iaculis neque ante
									adipiscing adipiscing metus massa. Blandit orci porttitor semper.
									Arcu phasellus tortor enim mi mi nisi praesent adipiscing. Integer
									mi sed nascetur cep aliquet augue varius tempus. Feugiat lorem
									ipsum dolor nullam.' ) );
							?>
									
								</div>
								<div class="col-4 col-12-medium">
									<?php
								echo apply_filters( 'the_content', get_theme_mod( 'section_one_content2', 'Morbi enim nascetur et placerat lorem sed iaculis neque ante
									adipiscing adipiscing metus massa. Blandit orci porttitor semper.
									Arcu phasellus tortor enim mi mi nisi praesent adipiscing. Integer
									mi sed nascetur cep aliquet augue varius tempus. Feugiat lorem
									ipsum dolor nullam.' ) );
							?>
								</div>
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly"><?php esc_html_e('Next', 'landed'); ?></a>
				</section>

			<!-- Two -->
				<section id="two" class="spotlight style2 right">
					<span class="image fit main"><img src="<?php echo esc_url(get_theme_mod('section_two_image', get_template_directory_uri() .'/assets/images/pic03.jpg')); ?>" alt="<?php echo esc_attr('Images', 'landed'); ?>" /></span>
					<div class="content">
						<header>
							<h2><?php esc_html_e(get_theme_mod('section_two_title', __('Interdum amet non magna accumsan','landed')),'landed'); ?></h2>
							<?php echo apply_filters('the_content', get_theme_mod('section_two_subtitle', __('Nunc commodo accumsan eget id nisi eu col volutpat magna', 'landed'))); ?>
						</header>
							<?php echo apply_filters('the_content', get_theme_mod('section_two_description', __('Nunc commodo accumsan eget id nisi eu col volutpat magna', 'landed'))); ?>						
						<ul class="actions">
							<li><a href="<?php echo esc_url(get_theme_mod('section_two_button_url', __('#','landed')),'landed'); ?>" class="button">
							<?php esc_html_e(get_theme_mod('section_two_button', __('Lear More','landed')),'landed'); ?>
							</a></li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly"><?php esc_html_e('Next', 'landed'); ?></a>
				</section>
			
				<!-- Three -->
				<section id="three" class="spotlight style3 left">
					<span class="image fit main"><img src="<?php echo esc_url(get_theme_mod('section_three_image', get_template_directory_uri() .'/assets/images/pic03.jpg')); ?>" alt="<?php echo esc_attr('Images', 'landed'); ?>" /></span>
					<div class="content">
						<header>
							<h2><?php esc_html_e(get_theme_mod('section_three_title', __('Interdum amet non magna accumsan','landed')),'landed'); ?></h2>
							<?php echo apply_filters('the_content', get_theme_mod('section_three_subtitle', __('Nunc commodo accumsan eget id nisi eu col volutpat magna', 'landed'))); ?>
						</header>
							<?php echo apply_filters('the_content', get_theme_mod('section_three_description', __('Nunc commodo accumsan eget id nisi eu col volutpat magna', 'landed'))); ?>						
						<ul class="actions">
							<li><a href="<?php echo esc_url(get_theme_mod('section_three_button_url', __('#','landed')),'landed'); ?>" class="button">
							<?php esc_html_e(get_theme_mod('section_three_button', __('Lear More','landed')),'landed'); ?>
							</a></li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly"><?php esc_html_e('Next', 'landed'); ?></a>
				</section>

			<!-- Four -->
				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2>
									<?php echo esc_html(get_theme_mod('section_four_title',__('Accumsan sed tempus adipiscing blandit','landed'))); ?>									
							</h2>
									<?php echo esc_html(get_theme_mod('section_four_subtitle',__('Iaculis ac volutpat vis non enim gravida nisi faucibus posuere arcu consequat','landed'))); ?>

							<p></p>
						</header>
						<div class="box alt">
							<div class="row gtr-uniform">
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-<?php echo esc_attr(get_theme_mod('section_four_box1_icon', 'area-chart')); ?>"></span>
									<h3 id="box1_title">
									<?php echo esc_html(get_theme_mod('section_four_box1_title',__('Eleifend 1 lorem ornare','landed'))); ?>									
									</h3>
									<?php echo esc_html(get_theme_mod('section_four_box1_subtitle',__('Eleifend 1 lorem ornare','landed'))); ?>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-<?php echo esc_attr(get_theme_mod('section_four_box2_icon', 'area-chart')); ?>"></span>
									<h3 id="box2_title">
									<?php echo esc_html(get_theme_mod('section_four_box1_title',__('Eleifend 2 lorem ornare','landed'))); ?>
									</h3>
									<?php echo apply_filters('the_content',get_theme_mod('section_four_box1_subtitle',__('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.', 'landed'))); ?>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-<?php echo esc_attr(get_theme_mod('section_four_box3_icon', 'flusk')); ?>"></span>
									<h3 id="box3_title">
									<?php echo esc_html(get_theme_mod('section_four_box3_title',__('Eleifend 3 lorem ornare','landed'))); ?>
									</h3>
									<?php echo apply_filters('the_content',get_theme_mod('section_four_box3_subtitle',__('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.', 'landed'))); ?>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-<?php echo esc_attr(get_theme_mod('section_four_box4_icon', 'paper-plane')); ?>"></span>
									<h3 id="box4_title">
									<?php echo esc_html(get_theme_mod('section_four_box4_title',__('Eleifend 4 lorem ornare','landed'))); ?>									
									</h3>
									<?php echo apply_filters('the_content',get_theme_mod('section_four_box4_subtitle',__('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.', 'landed'))); ?>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-<?php echo esc_attr(get_theme_mod('section_four_box5_icon', 'file')); ?>"></span>
									<h3 id="box5_title">
									<?php echo esc_html(get_theme_mod('section_four_box5_title',__('Eleifend 5 lorem ornare','landed'))); ?>									
									</h3>
									<?php echo apply_filters('the_content',get_theme_mod('section_four_box5_subtitle',__('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.', 'landed'))); ?>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-<?php echo esc_attr(get_theme_mod('section_four_box6_icon', 'lock')); ?>"></span>
									<h3 id="box6_title">
									<?php echo esc_html(get_theme_mod('section_four_box6_title',__('Eleifend 6 lorem ornare','landed'))); ?>									
									</h3>
									<?php echo apply_filters('the_content',get_theme_mod('section_four_box6_subtitle',__('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.', 'landed'))); ?>
								</section>
							</div>
						</div>
						<footer class="major">
							<ul class="actions special">
								<li><a href="<?php echo esc_attr(get_theme_mod('section_four_button_url', __('#', 'landed'))); ?>" class="button">
								<?php echo esc_html(get_theme_mod('section_four_button_label', __('Magna sed feugiat','landed'))); ?>
								</a></li>
							</ul>
						</footer>
					</div>
				</section>

			<!-- Five -->
				<section id="five" class="wrapper style2 special fade">
					<div class="container">
						<header id="five-header">
							<h2>
							<?php echo esc_html(get_theme_mod('section_five_title', __('Magna faucibus lorem diam', 'landed'))); ?>
							</h2>
							<?php echo apply_filters('the_content', get_theme_mod('section_five_subtitle', __('Ante metus praesent faucibus ante integer id accumsan eleifend', 'landed'))); ?>
						</header>
						<div id="email">
						<?php echo get_theme_mod('section_five_eform', '<form method="post" action="#" class="cta">
							<div class="row gtr-uniform gtr-50">
								<div class="col-8 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Your Email Address" /></div>
								<div class="col-4 col-12-xsmall"><input type="submit" value="Get Started" class="fit primary" /></div>
							</div>
						</form>'); ?>
						</div>
					</div>
				</section>

			<?php get_footer(); ?>