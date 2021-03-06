<?php get_header(); ?>
<!-- Page Content -->
<div class="container">
<div class="row">
	<!-- Blog Post Content Column -->
    <div class="col-lg-12">
	<div id="posts_wrapper">
				<?php while(have_posts()) : the_post(); ?>
					
					<!-- Title -->	
					<h1 class="postHeading"><i class="fa fa-pencil-square-o"></i> <?php the_title(); ?></h1>	
					<!-- Author/Time -->
					<p>Posted on <?php the_time('F jS, Y') ?> by <?php the_author(); ?></p>
					<hr>
					<p><?php the_content(); ?></p>
					<br>
					<?php 
					if ( is_user_logged_in() ) {
						edit_post_link('Edit', '<p>', '</p>'); 
					} ?> 
					
				<?php endwhile; wp_reset_query(); ?>
                </div>
	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>