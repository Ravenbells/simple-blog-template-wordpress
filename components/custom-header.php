<!DOCTYPE html>
<html id="Blogs-Navas" lang="pt-BR">

<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navas-Blogs</title>
</head>

<body class="hidden-x" <?php body_class(); ?>>
    <header id="header" role="menu">
        <span class="draw-circle"></span>
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row">
                    <h3 class="blog-post-title">Blog Post</h3>
                    <nav class="menu-breadcrumb">
                        <?php echo do_shortcode("[Breadcrumb_posts]") ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>