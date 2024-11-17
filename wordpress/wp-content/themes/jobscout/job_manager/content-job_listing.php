<style>
	.entry-title a {
		text-transform: uppercase;
	}

	.job-date {
		font-size: 0.8888em;
		color: rgba(0, 0, 0, 0.5);
		font-weight: 400;
		line-height: 1.44em;
		margin-top: 5px;
	}

	.company-logo {
		border: 1px solid gray;
		padding: 5px;
		background: none !important;
		height: 100px;
	}

	.job-info {
		background-color: #f5f5f5;
		/* Nền màu xám nhạt */
		padding: 8px 12px;
		/* Khoảng cách xung quanh */
		border-radius: 6px;
		/* Bo tròn các góc */
		display: flex;
		/* Hiển thị ngang các phần tử */
		justify-content: space-between;
		align-items: center;
		/* Căn giữa theo chiều dọc */
		font-size: 14px;
		/* Kích thước chữ */
		color: #666 !important;
		/* Màu chữ */
	}

	.info-item {
		margin: 0 5px;
		/* Khoảng cách ngang giữa các mục */
		padding: 0 5px;
	}

	.separator {
		color: #ccc;
		/* Màu sắc của dấu phân cách */
	}

	.category {
		text-align: center;
	}

	.location a {
		text-align: center !important;
		text-decoration: none;
		color: #666 !important;
	}

	.top-job-section .row div.job_listings article .entry-meta {
		border-top: none !important;
	}

	/* Thiết lập giới hạn chiều rộng cho mô tả công việc */
	.job-description{
		margin: 20px 0px 0px 0px;
		font-size: 16px;
		padding-left: 15px;
	}

	.top-job-section .row div.job_listings article {
		width: 45%;
		padding: 20px;
	}
</style>
<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;
$job_salary   = get_post_meta(get_the_ID(), '_job_salary', true);
$job_featured = get_post_meta(get_the_ID(), '_featured', true);
$company_name = get_post_meta(get_the_ID(), '_company_name', true);
$job_date = get_the_date('M d, Y', get_the_ID());

?>
<article <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr($post->geolocation_lat); ?>" data-latitude="<?php echo esc_attr($post->geolocation_long); ?>">

	<figure class="company-logo">
		<?php the_company_logo('thumbnail'); ?>
	</figure>

	<div class="job-title-wrap">

		<h2 class="entry-title">
			<a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a>
		</h2>

		<?php
		if ($job_date) { ?>
			<div class="job-date">
				<?php echo 'Created: ' . esc_html($job_date); ?>
			</div>
		<?php } ?>

		<div class="job-info">
			<?php
			if (get_option('job_manager_enable_types')) {
				$types = wpjm_get_the_job_types();
				if (! empty($types)) : foreach ($types as $jobtype) : ?>
						<span class="info-item"><?php echo esc_html($jobtype->name); ?> </span>
			<?php endforeach;
				endif;
			}
			?>
			<span class="separator">|</span>
			<span class="info-item category"><?php the_company_name(); ?></span>
			<span class="separator">|</span>
			<span class="info-item location"><?php the_job_location(true); ?></span>
		</div>

	</div>

	<p class="job-description"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
	

	<?php
	do_action('job_listing_meta_end');
	?>

	<?php if ($job_featured) { ?>
		<div class="featured-label"><?php esc_html_e('Featured', 'jobscout'); ?></div>
	<?php } ?>

</article>