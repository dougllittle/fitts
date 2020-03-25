<?php get_header(); ?>
<main role="main">
	<div class="container">
		<div class="row">
			<section class="col-12 col-sm-8" id="fitts-main">
				<?php 
				   // the query
				   $the_query = new WP_Query( array(
				      'posts_per_page' => 3,
				   )); 
				?>
				<?php 
				if ( $the_query->have_posts() ) : 
				    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<article style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="article-box"></div>
							<div class="fitts-article-wrap">
								<div class="article-categories">
									<?php 
										$categories = get_the_category();
										$separator = ', ';
										$output = '';
										if ( ! empty( $categories ) ) {
										    foreach( $categories as $category ) {
										        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
										    }
										    echo trim( $output, $separator );
										}
									?>
								</div>
								<div class="article-header">
									<h2 class="article-title"><?php the_title(); ?></h2>
								</div>
								<div class="article-content">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</article>
				        <?php
				    endwhile; 
				else: 
				    _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
				endif; 
				?>
			</section>
			<section id="fitts-sidebar" class="col-12 col-sm-4">
				<section id="fitts-sidebar-intro" class="sidebar-card">
					<img src="http://fitts.local/wp-content/uploads/2020/02/cheesin-e1542485937615-scaled.jpg" id="sidebar-intro-headshot" alt="The author headshot." />
					<div id="sidebar-intro-card">
						<h2 id="intro-card-name" class="fitts-first-cap">Olivia Fitts</h2>
						<div id="intro-card-social">
							<a href="#" class="card-social-link"><i class="fa fa-facebook-f"></i><p class="hidden-visually">Facebook</p></a>
							<a href="#" class="card-social-link"><i class="fa fa-instagram"></i><p class="hidden-visually">Instagram</p></a>
							<a href="#" class="card-social-link"><i class="fa fa-twitter"></i><p class="hidden-visually">Twitter</p></a>
						</div>
					</div>
				</section>
				<section class="sidebar-card">
					<h2 class="fitts-first-cap">Each letter should be bigger than the others.</h2>
				</section>
				<!-- <section class="fitts-sidebar-subscribe">
					<div class="fitts-subscribe-intro">
						<h2>Subscribe</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit!</p>
					</div>
				    <form id="fitts-subscribe" action="#">
				    	<div class="fitts-form-group fitts-form-group-checkbox">
				        	<label for="Privacy" class="fitts-subscribe-label" for="Privacy">
				        		<input type="checkbox" id="Privacy" name="Privacy">Privacy Policy
				        	</label>
				      	</div>
				      	<div class="fitts-form-group">
					        <input type="email" id="Email" placeholder="Email Address" name="Email">
					        <label class="fitts-subscribe-label" for="Email">Email Address</label>
				      	</div>
				      	<div class="fitts-form-group">
			      			<input type="submit" value="Subscribe" id="Subscribe">
			      		</div>
				    </form>
				</section> -->
			</section>
		</div>
	</div>
</main>
<?php get_footer(); ?>