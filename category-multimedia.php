<?php get_header(); ?><header class="row">	<div class="full-width">		<div class="sectionhead">			<div class="hline hline-background"></div>			<span class="sectionhead-text sectionhead-text-centered"><?php single_cat_title(); ?></span>		</div>	</div></header><main>	<div class="full-width">		<div class="hline hline-strong"></div>	</div>	<?php $displays = array('video' => 'Video','gallery' => 'Photo Gallery','audio' => 'Audio');?>	<?php $args = array( 'posts_per_page' => 3, 'cat' => $top_story, 'tax_query' => array(array(			'taxonomy' => 'post_format',			'field' => 'slug',			'terms' => array('post-format-video', 'post-format-gallery', 'post-format-audio')		))); ?>	<?php $myposts = get_posts( $args ); ?>	<section class="row">		<article class="main">			<?php if (!empty($myposts[0])) : ?>			<?php $post = $myposts[0]; ?>			<?php setup_postdata( $post ); ?>			<?php $format  = get_post_format(get_the_ID());?>			<article class="vmedia">				<a href="<?php the_permalink(); ?>">				<figure class="thumbnail hovertext-container">					<?php if ( has_post_thumbnail()) {the_post_thumbnail('large');} ?>					<h5 class="hovertext">						<i class="fa fa-play"></i>						&nbsp;<?php echo $displays[$format] ?>					</h5>				</figure>				</a>				<div class="block">					<a href="<?php the_permalink(); ?>">						<h1 id="post-<?php the_ID(); ?>">							<?php the_title(); ?>						</h1>					</a>					<p class="excerpt">						<?php get_excerpt(); ?>					</p>				</div>			</article>		<?php endif; ?>		</article>		<sidebar class="sidebar">			<?php if (!empty($myposts[1])) : ?>			<?php $post = $myposts[1]; ?>			<?php setup_postdata( $post ); ?>			<?php $format = get_post_format(get_the_ID());?>			<article class="vmedia">				<a href="<?php the_permalink(); ?>">					<figure class="thumbnail hovertext-container">						<?php if ( has_post_thumbnail()) {the_post_thumbnail('medium');} ?>						<h5 class="hovertext">							<i class="fa fa-play"></i>							&nbsp;<?php echo $displays[$format] ?>						</h5>					</figure>					<div class="block">						<h4 id="post-<?php the_ID(); ?>">							<?php the_title(); ?>						</h4>					</div>				</a>			</article>			<?php endif; ?>			<div class="hline hline-medium"></div>			<?php if (!empty($myposts[2])) : ?>			<?php $post = $myposts[2]; ?>			<?php setup_postdata( $post ); ?>			<?php $format = get_post_format(get_the_ID());?>			<article class="vmedia">				<a href="<?php the_permalink(); ?>">					<figure class="thumbnail hovertext-container">						<?php if ( has_post_thumbnail()) {the_post_thumbnail('medium');} ?>						<h5 class="hovertext">							<i class="fa fa-play"></i>							&nbsp;<?php echo $displays[$format] ?>						</h5>					</figure>					<div class="block">						<h4 id="post-<?php the_ID(); ?>">							<?php the_title(); ?>						</h4>					</div>				</a>			</article>			<?php endif; ?>		</sidebar>	</section>	<?php $postsPerSlide = 4; $slides = 5;?>	<?php $postFormats = array('video' => 'videos','gallery' => 'galleries','audio' => 'audio');?>	<?php foreach ($postFormats as $format => $display):?>	<section class="row">		<div class="full-width">			<div class="hline hline-medium"></div>			<h6><a href="<?php echo esc_url(get_post_format_link($format)); ?>"><?php echo $display ?></a></h6>			<?php $args = array( 'posts_per_page' => $postsPerSlide*$slides, 'tax_query' => array(array(				'taxonomy' => 'post_format',				'field' => 'slug',				'terms' => array('post-format-'.$format)			))); ?>			<?php $myposts = new WP_Query( $args ); ?>			<div class="slidecontainer">				<div class="arrows-container">					<div class="arrow-left">						<i class="fa fa-arrow-left fa-2x"></i>					</div>					<div class="arrow-right">						<i class="fa fa-arrow-right fa-2x"></i>					</div>				</div>				<div class="slicktarget slidelist">					<?php while ( $myposts->have_posts() ) : ?>					<?php $myposts->the_post();?>					<div class="slick-item">						<div>							<a href="<?php the_permalink(); ?>">								<figure class="thumbnail hovertext-container">									<?php if ( has_post_thumbnail()) {the_post_thumbnail('medium');} ?>									<div class="hovertext hovertext-small">										<i class="fa fa-play"></i>									</div>								</figure>									<h4 id="post-<?php the_ID(); ?>">										<?php the_title(); ?>									</h4>							</a>						</div>					</div>					<?php endwhile; ?>				</div>			</div>		</div>	</section>	<?php endforeach;?>	<div class="full-width">		<div class="hline hline-medium"></div>	</div></main><script>	jQuery(document).ready(function() {		jQuery('.slidecontainer').each(function (i, element) {			jQuery('.arrow-left', element).attr('id', 'prev-' + i);			jQuery('.arrow-right', element).attr('id', 'next-' + i);			jQuery('.slicktarget', element).attr('id', 'slidelist-' + i);		});		jQuery('.slidelist').each(function (i, element) {			jQuery(element).slick({				infinite: false,				slidesToShow: <?php echo $postsPerSlide; ?>,				slidesToScroll: <?php echo $postsPerSlide; ?>,				prevArrow: '#prev-' + i,				nextArrow: '#next-' + i,				dots: false,				responsive: [					{						breakpoint: 959,						settings: {							slidesToShow: 3,							slidesToScroll: 3						}					},					{						breakpoint: 639,						settings: {							slidesToShow: 2,							slidesToScroll: 2						}					}				]			});		});	});</script><?php get_footer(); ?>