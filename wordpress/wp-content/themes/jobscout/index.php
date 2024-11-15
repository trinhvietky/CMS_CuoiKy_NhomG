<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */
get_header(); ?>



<style>

.services-container {
	background-color: #ddd;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
	
}
@media (max-width: 768px) {
    .service-item {
        width: 100%; 
    }
}


.service-image {
    margin-right: 20px;
    max-width: 220px;
    height: 220px; 
    object-fit: cover;
}

.service-content {
    flex: 1;
}
.service-title {
    font-size: 18px;
    font-weight: bold;
}

.service-description {
    font-size: 14px;
}
.service-item {
    display: flex;
    flex-direction: row;
    width: 48%;
    background-color: #fff;
    padding: 20px;
    text-align: left;
    box-sizing: border-box;
	 margin-bottom: 20px; 
}

.service-content {
    flex: 1;
    min-width: 0; 
}

.service-title {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
}
.service-title a{
    color: black !important;
	font-weight: bolder;
}
.service-description {
    font-size: 14px;
    font-weight: 700;
    color: #555;
    margin: 10px 0;
}

.service-link {
    color: #fb8b23 !important;
    text-decoration: none;
    font-weight: bold;
}
.newest-blog-title {
    font-weight: bold;   
    text-align: center;  
    margin-bottom: 20px; 
    font-size: 32px;     
	width: 100%;
	margin-top: 40px;
}

</style>
	<div id="primary" class="content-area">
		
        <?php 
        /**
         * Before Posts hook
        */
        do_action( 'jobscout_before_posts_content' );
        ?>
        
        <main id="main" class="site-main">
		</main><!-- #main -->
		<div class="services-container">
			<h1 class="newest-blog-title">NEWEST BLOG ENTRIES</h1> 
			<?php
			// WordPress Loop để lấy tất cả bài viết
			$query = new WP_Query(array(
				'post_type' => 'post', 
				'posts_per_page' => -1  // Lấy tất cả bài viết
			));
			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post();
			?>
				<div class="service-item">
				<!-- Hiển thị hình ảnh nổi bật -->
				<?php if (has_post_thumbnail()) : ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('medium', ['class' => 'service-image']); ?>
					</a>
				<?php endif; ?>

				<div class="service-content">
					<!-- Hiển thị tiêu đề bài viết -->
					<h3 class="service-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>

					<!-- Hiển thị phần trích dẫn nội dung bài viết -->
					<p class="service-description"><?php echo get_the_excerpt(); ?></p>

					<!-- Link đến bài viết đầy đủ -->
					<a href="<?php the_permalink(); ?>" class="service-link">Read More</a>
				</div>
    </div>
    <?php
        endwhile;
        wp_reset_postdata();  // Đảm bảo các query khác không bị ảnh hưởng
    endif;
    ?>
</div>

	</div>

        <!-- <?php
        /**
         * After Posts hook
         * @hooked jobscout_navigation - 15
        */
        do_action( 'jobscout_after_posts_content' );
        ?> -->
        
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
