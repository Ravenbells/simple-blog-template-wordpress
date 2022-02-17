<!DOCTYPE html>
<html id="Blogs-Navas" lang="pt-BR">

<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navas-Blogs</title>
</head>

<body <?php body_class(); ?>>
    <header id="header" role="menu">
        <span class="img-bullets mt-2"></span>
        <div class="container-fluid py-5">
            <nav class="menu-nav nav navbar col-12">
                <?php wp_nav_menu(
                    array(
                        'theme_localtion' => 'top-menu',
                        'menu_class' => 'menu-item'
                    )
                );
                ?>
            </nav>
        </div>
    </header>