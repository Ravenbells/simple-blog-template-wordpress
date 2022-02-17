<?php
add_theme_support('post-thumbnails');

function load_stylesheets()
{
    wp_register_style('bootstrap_min', get_template_directory_uri() . '/assets/css/bootstrap-5.1.3.min.css', array() . false, 'all');
    wp_register_style('bootstrap_map', get_template_directory_uri() . '/assets/css/bootstrap-5.1.3.css.map', array(), false, 'all');
    wp_register_style('custom_css', get_template_directory_uri() . '/assets/css/custom.css', array(), false, 'all');
    wp_enqueue_style('bootstrap_min');
    wp_enqueue_style('bootstrap_map');
    wp_enqueue_style('custom_css');
}
add_action("wp_enqueue_scripts", "load_stylesheets");

function load_jquery()
{
    wp_deregister_script('jquery');
    wp_register_script("jquery", get_template_directory_uri() . "/assets/js/jquery-3.6.0.min.js", '', 1, true);
    wp_enqueue_script('jquery');
}
add_action("wp_enqueue_scripts", "load_jquery");

function loadjs()
{
    wp_register_script("customjs", get_template_directory_uri() . "/assets/js/custom.js", '', 1, true);
    wp_enqueue_script("customjs");
}
add_action("wp_enqueue_scripts", "loadjs");

add_theme_support('menus');
register_nav_menus(
    array(
        'top-menu' => __('Cabeçalho', 'theme'),
        'footer-menu' => __('Rodapé', 'theme'),
    )
);

function all_post()
{
    if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-lg-4 col-12">
                <div class="posts-img">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="posts-thumbnail">
                    <?php else : ?>
                        <img src="wp-content/themes/navas-template/assets/img/img-grey.jpg" class="posts-thumbnail grey">
                    <?php endif ?>
                </div>
                <div class="posts-data">
                    <span><?php echo get_the_date('d F, Y'); ?></span>
                </div>
                <div class="posts-title">
                    <span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                </div>
                <div class="posts-author">
                    <span>Written by <?php the_author(); ?></span>
                </div>
            </div>
        <?php endwhile;
    endif;
}
add_shortcode('all_post', 'all_post');

function single_post()
{
    if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="info-content d-flex flex-column justify-content-start col-6">
                <div class="info-fixed">
                    <div class="posts-img">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" class="posts-thumbnail">
                        <?php else : ?>
                            <img src="wp-content/themes/navas-template/assets/img/img-grey.jpg" class="img-thumbnail grey">
                        <?php endif ?>
                    </div>
                    <div class="user-info">
                        <div class="user-avatar">
                            <?php echo get_avatar(get_the_author_meta("ID")); ?>
                        </div>
                        <div class="posts-author col-8">
                            <div class="posts-info">
                                <span class="author"><?php echo get_the_author_meta("display_name"); ?></span>
                                <span class="data"><?php echo get_the_date('d F, Y'); ?></span>
                            </div>
                        </div>
                        <div class="bttn-back col-xl-10 col-lg-7 col-5">
                            <button class="blogs-back">Voltar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="posts-text col-6">
                <div class="posts-title">
                    <span><?php the_title(); ?></span>
                </div>
                <div class="posts-content-all">
                    <span><?php echo get_the_content(); ?></span>
                </div>
            </div>
        <?php endwhile;
    endif;
}
add_shortcode('single_post', 'single_post');

function lastest_post()
{
    $args = array(
        'posts_per_page' => 3,
        'offset' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish'
    );
    $query = new WP_Query($args);
    $count = 1;
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div id="blog-<?php echo $count ?>" class="content-blogs col-lg-11 col-md-8 col-12">
                <div class="content-text">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-thumbnail">
                <?php else : ?>
                    <img src="wp-content/themes/navas-template/assets/img/img-grey.jpg" class="img-thumbnail grey">
                <?php endif ?>
            </div>
            <?php $count++; ?>
<?php endwhile;
    endif;
}
add_shortcode('lastest-post', 'lastest_post');

?>