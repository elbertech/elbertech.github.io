<?php

/**

 * The template for displaying Archive pages.

 *

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *

 * @package zerif

 */



get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<?php zerif_after_header_trigger(); ?>

<div id="content" class="site-content">

<div class="container">



<div class="content-left-wrap col-md-12">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">



		<?php if ( have_posts() ) : ?>



			<header class="page-header">

				<h1 class="page-title">

					<?php

						if ( is_category() ) :

							single_cat_title();



						elseif ( is_tag() ) :

							single_tag_title();



						elseif ( is_author() ) :

							printf( __( 'Author: %s', 'zerif' ), '<span class="author vcard" itemprop="name">' . get_the_author() . '</span>' );



						elseif ( is_day() ) :

							printf( __( 'Day: %s', 'zerif' ), '<span>' . get_the_date() . '</span>' );



						elseif ( is_month() ) :

							printf( __( 'Month: %s', 'zerif' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'zerif' ) ) . '</span>' );



						elseif ( is_year() ) :

							printf( __( 'Year: %s', 'zerif' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'zerif' ) ) . '</span>' );



						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :

							_e( 'Asides', 'zerif' );



						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :

							_e( 'Galleries', 'zerif');



						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :

							_e( 'Images', 'zerif');



						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :

							_e( 'Videos', 'zerif' );



						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :

							_e( 'Quotes', 'zerif' );



						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :

							_e( 'Links', 'zerif' );



						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :

							_e( 'Statuses', 'zerif' );



						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :

							_e( 'Audios', 'zerif' );



						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :

							_e( 'Chats', 'zerif' );



						else :

							_e( 'Archives', 'zerif' );



						endif;

					?>

				</h1>

				<?php

					$term_description = term_description();

					if ( ! empty( $term_description ) ) :

						printf( '<div class="taxonomy-description">%s</div>', $term_description );

					endif;

				?>

			</header><!-- .page-header -->

			<?php 
			
				while ( have_posts() ) : 
			
					the_post();

					get_template_part( 'content', 'archive-download' );
				
				endwhile;
				
				zerif_paging_nav(); 
				
			else : 
			
				get_template_part( 'content', 'none' ); 
				
			endif; 
			
			?>

		</main><!-- #main -->

	</div><!-- #primary -->



</div><!-- .content-left-wrap -->

</div><!-- .container -->

<?php get_footer(); ?>