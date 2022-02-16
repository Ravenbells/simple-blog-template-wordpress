<?php get_header(); ?>

<section id="posts-page">
    <div class="container posts-content d-block">
        <div class="row">
            <?php echo do_shortcode("[all_post]"); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>