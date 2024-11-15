<?php
/**
 * Blog Section
 * 
 * @package JobScout
 */

$blog_heading = get_theme_mod( 'blog_section_title', __( 'Latest Articles', 'jobscout' ) );
$sub_title    = get_theme_mod( 'blog_section_subtitle', __( 'We will help you find it. We are your first step to becoming everything you want to be.', 'jobscout' ) );
$blog         = get_option( 'page_for_posts' );
$label        = get_theme_mod( 'blog_view_all', __( 'See More Posts', 'jobscout' ) );
$hide_author  = get_theme_mod( 'ed_post_author', false );
$hide_date    = get_theme_mod( 'ed_post_date', false );
$ed_blog      = get_theme_mod( 'ed_blog', true );

$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => true
);

$qry = new WP_Query( $args );

if( $ed_blog && ( $blog_heading || $sub_title || $qry->have_posts() ) ){ ?>
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
    height: 200px;
    object-fit: cover;
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
    padding: 15px;
    text-align: left;
    box-sizing: border-box;
	margin-bottom: 20px;
    align-items: center; /* Căn giữa theo chiều ngang */
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
<section id="blog-section" class="article-section">
	<div class="container">
        
        <?php if( $qry->have_posts() ){ ?>
            <div class="services-container">
        <h1 class="newest-blog-title">NEWEST BLOG ENTRIES</h1>
        <?php
        // WordPress Loop để lấy tất cả bài viết
        $query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 4  // Lấy tất cả bài viết
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
    		
            <?php if( $blog && $label ){ ?>
                <div class="btn-wrap" style="position: relative; top: 58px;">
        			<a href="<?php the_permalink( $blog ); ?>" class="btn"><?php echo esc_html( $label ); ?></a>
        		</div>
            <?php } ?>
        
        <?php } ?>
	</div>
</section>
<?php 
}