<?php get_header(); ?>
	<main class="main page-front d-flex flex-fill align-items-center">
		<div class="container">
			<div class="row no-gutters">
				<div class="block-slider col-12 col-lg-8">
					<div class="slider" id="slider">

						<?php $images = acf_photo_gallery( 'clajdy', $post->ID ); //Get the images ids from the post_metadata
			    
					    if ( count( $images ) ) : //Check if return array has anything in it

				        foreach ( $images as $image ):

			            $id = $image['id']; // The attachment id of the media
			            $title = $image['title']; //The title
			            $caption= $image['caption']; //The caption
			            $full_image_url= $image['full_image_url']; //Full size image url
			            //$full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
			            $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
			            $url= $image['url']; //Goto any link when clicked
			            $target= $image['target']; //Open normal or new tab
			            //$src = get_field('photo_gallery_src', $id); //Get the src which is a extra field (See below how to add extra fields)
						?>

		        <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>

			        <div class="slider-item">
								<img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>">
								<h2><?php echo str_replace( ' ', '<br>', $title ); ?></h2>
							</div>

		        <?php if( !empty($url) ){ ?></a><?php } ?>

						<?php endforeach; endif; ?>

					</div>
				</div>
				<div class="block-advantages col-12 col-lg-4 d-flex">
					<div class="row no-gutters flex-fill">
					 	<div class="col-6 d-flex flex-column">
				 			<div class="title flex-fill d-flex justify-content-center align-items-center">
				 				<h3>Преимущества /</h3>
				 			</div>
				 			<div class="stock flex-fill d-flex flex-column justify-content-end align-items-center">
				 				<p>Широкий ассортимент</p>
				 				<svg class="icon icon-stock align-self-start"><use xlink:href="#icon-stock"></use></svg>
				 			</div>
					 	</div>
					 	<div class="col-6 d-flex flex-column">
				 			<div class="intouch flex-fill d-flex flex-column justify-content-center align-items-center">
				 				<svg class="icon icon-intouch"><use xlink:href="#icon-intouch"></use></svg>
				 				<p>Всегда на связи</p>
				 			</div>
				 			<div class="speed flex-fill d-flex flex-column justify-content-end align-items-center">
				 				<p>Оперативность</p>
				 				<svg class="icon icon-speed align-self-end"><use xlink:href="#icon-speed"></use></svg>
				 			</div>
					 	</div>
					 </div> 
				</div>
			</div>
			<div class="row no-gutters">
				<div class="block-faces col-12 col-lg-8">
					<?php $my = get_field( 'my' ); ?>
					<?php if ( $my ) { ?>
						<img src="<?php echo $my['url']; ?>" alt="<?php echo $my['alt']; ?>" />
					<?php } ?>
					<p class="left"><?php the_field( 'imya_sleva' ); ?></p>
					<p class="right"><?php the_field( 'imya_sprava' ); ?></p>
				</div>
				<div class="block-about col-12 col-lg-4 d-flex flex-wrap align-content-stretch">
					<div class="flex-fill d-flex col-12 col-sm-6 col-lg-12 justify-content-center align-items-center align-self-center align-self-lg-end">
						<h3>О нас /</h3>
					</div>
					<div class="flex-fill d-flex flex-column col-12 col-sm-6 col-lg-12 justify-content-center align-items-center align-self-end">
						<small><?php the_field( 'o_nas' ); ?></small>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
