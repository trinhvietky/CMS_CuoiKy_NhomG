<?php
/**
 * Banner Section
 * 
 * @package JobScout
 */

$ed_banner = get_theme_mod('ed_banner_section', true);
$banner_title = get_theme_mod('banner_title', __('Tìm kiếm công việc - Hướng đến tương lai', 'jobscout'));
$banner_subtitle = get_theme_mod('banner_subtitle', __('Chúng tôi cam kết mang đến trải nghiệm tìm kiếm nhanh chóng và hiệu quả, giúp ứng viên khám phá được công việc mơ ước, đồng thời giúp nhà tuyển dụng tìm kiếm được những nhân tài sáng giá. Hãy bắt đầu hành trình sự nghiệp của bạn ngay hôm nay cùng chúng tôi và khám phá các cơ hội nghề nghiệp mới nhất!', 'jobscout'));
$find_a_job_link = get_option('job_manager_jobs_page_id', 0);

if ($ed_banner && has_custom_header()) { ?>
    <div id="banner-section" class="site-banner<?php if (has_header_video())
        echo esc_attr(' video-banner'); ?>">
        <div class="item">
            <?php the_custom_header_markup(); ?>
            <div class="banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="caption-inner">
                                <?php
                                if ($banner_title)
                                    echo '<h2 class="title">' . esc_html($banner_title) . '</h2>';
                                if ($banner_subtitle)
                                    echo '<div class="description">' . wpautop(wp_kses_post($banner_subtitle)) . '</div>';
                                ?>
                                <div class="form-wrap">
                                    <div class="search-filter-wrap">
                                        <?php
                                        if (jobscout_is_wp_job_manager_activated()) {
                                            if ($find_a_job_link) {
                                                get_template_part('template-parts/header', 'form');
                                            } else {
                                                get_search_form();
                                            }
                                        } else {
                                            get_search_form();
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
}