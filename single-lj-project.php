<?php
/**
 * The template for displaying all single Project posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jaxjax1
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			the_title( '<h1 class="page-title">', '</h1>' );

			if ( function_exists( 'get_field' )) :

				$projectImgMain = get_field( 'project_featured_img' );
				if ( $projectImgMain ) :
					echo wp_get_attachment_image($projectImgMain, 'full', '', array('id'=>'project-feat-img'));
				endif; 

				if ( get_field('project_description') ) :
					?>
					<p> <?php the_field( 'project_description' ); ?> </p> 
					<?php 
				endif;?>

				<?php if( have_rows('project_images') ):

					echo '<div class="sub-img-container">';
						while( have_rows('project_images') ): the_row(); 

							// Get sub field values.
							$image1 = get_sub_field('project_image_1');
							$image2 = get_sub_field('project_image_2');
							$image3 = get_sub_field('project_image_3');

							if ( $image1 ) :
								echo wp_get_attachment_image($image1, 'full', '', array('class'=>'project-img-sub'));
							endif; 

							if ( $image2 ) :
								echo wp_get_attachment_image($image2, 'full', '', array('class'=>'project-img-sub'));
							endif; 

							if ( $image3 ) :
								echo wp_get_attachment_image($image3, 'full', '', array('class'=>'project-img-sub'));
							endif; 
						endwhile;
					echo '</div>';
				endif;
					?>		
				<div class="tech-stack">
					<h2>Tools Used:</h2>
					
					<?php
					$techStack = get_field('tech_logo');
					if( $techStack ):
						echo '<ul>';
							foreach ($techStack as $singleTech) :
							?>
							<li>
								<?php
									get_template_part('template-parts/icons/icons8', $singleTech);
								?>
							</li>
							<?php
							endforeach;
						echo '</ul>';
					endif; ?>
				</div>
				<?php	

				if ( get_field('code_description') ) : ?>
					<section class="code-description">
						<p><?php the_field('code_description'); ?></p>
					</section>
					<?php
				endif;

				$gistEmbed = get_field('github_gist_shortcode');
				if ($gistEmbed) :
					echo do_shortcode('[gist id="' . $gistEmbed . '" /]');
				endif;	

				echo '<div id="project-link-container">';
				if ( get_field('github_link') ) :
					?>
					<a class="project-links" target="_blank" href="<?php the_field( 'github_link' ); ?>">View on GitHub</a>
					<?php 
				endif;

				if ( get_field('live_site_link') ) :
					?>
					<a class="project-links" target="_blank" href="<?php the_field( 'live_site_link' ); ?>">Go to live site</a>
					<?php 
				endif; 
				echo '</div>';
			
					
				
			endif;



			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'jaxjax1' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'jaxjax1' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
