<?php
/*
Template Name: Продукт: Цинк
Template Post Type: page
*/
?>
<?php get_header(); ?>
	<main class="main page-product-single d-flex flex-fill align-items-center">

		<?php while ( have_posts() ) : the_post(); // Start the loop. ?>

		<div class="block-product-single content container">
			<div class="row no-gutters">

				<div class="col-12 col-lg-8 d-flex flex-column">

					<div class="row no-gutters d-flex flex-fill flex-column align-items-stretch">

						<div class="title col-12">
							<h2><?php the_title(); ?></h2>
						</div>

						<div class="content-image col-12 d-flex flex-fill flex-column flex-sm-row align-items-stretch align-self-end">
							<div>

								<?php $images = acf_photo_gallery('primery', $post->ID); //Get the images ids from the post_metadata
					    
						    if ( count( $images ) ) : //Check if return array has anything in it

						    	$i = 0;

					        foreach ( $images as $image ) :

				            // $id = $image['id']; // The attachment id of the media
				            $title = $image['title']; //The title
				            // $caption = $image['caption']; //The caption
				            $full_image_url = $image['full_image_url']; //Full size image url
				            $full_image_url = acf_photo_gallery_resize_image($full_image_url, 768, 432); //Resized size to 262px width by 160px height image url
				            // $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
				            $url = $image['url']; //Goto any link when clicked
				            $target = $image['target']; //Open normal or new tab
				            // $src = get_field('photo_gallery_src', $id); //Get the src which is a extra field (See below how to add extra fields)
				            if ( $i > 0 ) : break; endif;
				            if ( $i === 0 ) :
								?>

								<?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>

			          <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>">

			        	<?php if( !empty($url) ){ ?></a><?php } ?>

			        	<?php endif; $i++; endforeach; endif; ?>

							</div>
						</div>

					</div>
				</div>

				<div class="content-text col-12 col-lg-4 d-flex flex-column">
					<?php the_content(); ?>
				</div>

			</div>
			<div class="row no-gutters">
				
				<div class="col-12">
					<div class="row no-gutters">
						
						<div class="content-image col-12 d-flex flex-column flex-lg-row align-items-stretch">
							
					    <?php if ( count( $images ) ) : //Check if return array has anything in it

					    	$i = 0;

				        foreach ( $images as $image ) :

			            // $id = $image['id']; // The attachment id of the media
			            $title = $image['title']; //The title
			            // $caption = $image['caption']; //The caption
			            $full_image_url = $image['full_image_url']; //Full size image url
			            $full_image_url = acf_photo_gallery_resize_image($full_image_url, 768, 432); //Resized size to 262px width by 160px height image url
			            // $thumbnail_image_url = $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
			            $url = $image['url']; //Goto any link when clicked
			            $target = $image['target']; //Open normal or new tab
			            //$src = get_field('photo_gallery_src', $id); //Get the src which is a extra field (See below how to add extra fields)
			            $i++; 
			            if ( $i === 1 ) : continue; endif;
							?>

							<div>

								<?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>

			          <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>">

			        	<?php if( !empty($url) ){ ?></a><?php } ?>

		        	</div>

		        	<?php endforeach; endif; ?>

						</div>
					</div>
				</div>
			</div>

		</div>

		<?php endwhile; // End of the loop. ?>

	</main>
<?php get_footer(); ?>
