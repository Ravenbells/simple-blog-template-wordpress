<!-- Header -->
<?php get_header(); ?>
<?php do_action("Current_Page", "Current_Page"); ?>
<main id="home">
    <!-- Pages  -->
    <?php the_post_thumbnail(); ?>
    <?php require("components/show-posts.php"); ?>
</main>
<!-- Footer -->
<?php get_footer(); ?>