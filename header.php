<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title><?php wp_title(' | ', true, 'left') ?></title>

    <!-- Custom CSS -->
    <link href="<?php bloginfo('stylesheet_url') ?>" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/wp_boot/">Logo</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
				wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
				);
			?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<!-- featured post -->
	<?php if(is_front_page()): { ?>
	<div class="container-fluid featuredPost">
	
			<div class="container featuredPostContent">
		<div id="myCarousel" class="carousel slide row" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<!-- ACTIVE SLIDE -->
				<?php 		
					query_posts('category_name=Featured&posts_per_page=1');
					while(have_posts()) : the_post(); 
				?>
					<div class="item active"> 
						<p class="featuredText">Featured post:</p> 
						<h2 class="featuredPostTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="postedOn">Posted on <?php the_time('F jS, Y') ?> by <?php the_author(); ?></p>
						<div class="featuredPostImageContainer">
						<?php 
						if (has_post_thumbnail()) {
							the_post_thumbnail('single-post-thumbnail',
							array (
								'class' => "img-responsive featuredPostImage")
							
							);
						} ?>
						</div>
					<p><?php the_excerpt(); ?></p>
					</div>
					
				
				<?php endwhile; wp_reset_postdata(); ?>
				<!-- ACTIVE SLIDE END -->
				<?php 		
					query_posts('category_name=Featured&posts_per_page=2&offset=1');
					while(have_posts()) : the_post(); 
				?>
					<div class="item"> 
						<p class="featuredText">Featured post:</p> 
						<h2 class="featuredPostTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="postedOn">Posted on <?php the_time('F jS, Y') ?> by <?php the_author(); ?></p>
						<div class="featuredPostImageContainer">
						<?php 
						if (has_post_thumbnail()) {
							the_post_thumbnail('single-post-thumbnail',
							array (
								'class' => "img-responsive featuredPostImage")
							
							);
						} ?>
						</div>
					<p><?php the_excerpt(); ?></p>
					</div>
					
				
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	
	</div>
	</div>
	<?php } endif; ?><!-- featured post end -->
