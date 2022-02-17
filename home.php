<?php get_header(); ?>
<?php do_action("Current_Page", "Current_Page"); ?>
<section id="posts-page">
    <div class="container posts-content d-block">
        <div class="row">
            <?php echo do_shortcode("[all_post]"); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>