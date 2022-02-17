<?php require("components/custom-header.php"); ?>
<section id="single">
    <div class="container">
        <div class="row">
            <?php echo do_shortcode("[single_post]"); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>