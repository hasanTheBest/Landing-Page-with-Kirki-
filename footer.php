<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package landed
 */

?> 

</div><!-- #content -->


<!-- Footer -->
				<footer id="footer">
					
						<?php if(is_active_sidebar('landed_footer_social')){
							dynamic_sidebar('landed_footer_social');
						}; ?>
					
					
						<?php if(is_active_sidebar('landed_footer_copywrite')){
							dynamic_sidebar('landed_footer_copywrite');
						}; ?>
					
				</footer>

		</div>

		<!-- Scripts -->
		<?php wp_footer(  ); ?>

	</body>
</html>

