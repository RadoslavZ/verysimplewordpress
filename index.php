<?php get_header(); ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">	
                <!-- Blog Posts -->
				<div id="posts_wrapper">
				<?php 
					query_posts('showposts=3');
					while(have_posts()) : the_post(); ?>
					<div class="postIndex row">
						<!-- Title -->	
						<h2><a href="<?php the_permalink(); ?>"><i class="fa fa-pencil-square-o"></i> <?php the_title(); ?></a></h2>	
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
				<?php endwhile;?>
                </div>
            </div>

        </div>
        <!-- /.row -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>