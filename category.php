<?php get_header(); ?>
<div class="container-fluid categoryDesc">
	<div class="container categoryContent">
		<h1><i class="fa fa-archive fa-3"></i> <?php single_cat_title(''); ?></h1>
	</div>
</div>
<div class="container">
<div class="row">
	<!-- Blog Post Content Column -->
    <div class="col-lg-12">
	<div id="posts_wrapper">
				<?php while(have_posts()) : the_post(); ?>
					
					<!-- Title -->	
					<div class="postIndex">
					<h2 class="postHeading"><i class="fa fa-pencil-square-o"></i> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	
					<!-- Author/Time -->
					<p>Posted on <?php the_time('F jS, Y') ?> by <?php the_author(); ?></p>
					<hr>
					<div class="PostImageContainer">
						<?php 
						if (has_post_thumbnail()) {
							the_post_thumbnail('single-post-thumbnail',
							array (
								'class' => "img-responsive PostImage")
							
							);
						} ?>
						</div>
					<p><?php the_excerpt(); ?></p>
					<br>
					</div>
				<?php endwhile; ?>
				<div id="posts_navigation" >
                    <?php previous_posts_link(); ?>		
                    <?php next_posts_link(); ?>
                </div>
                </div>
	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>