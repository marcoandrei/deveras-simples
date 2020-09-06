<?php

/**
 * Página padrão do tema Deveras Simples.
 *
 * @package Deveras_Simples
 * @since 0.1
 */
?>

<!-- Declarações de linguagem e idioma obrigatórias -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- Cabeçalho padrão HTML -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="cabecalho" class="site-header">
        <div class="site-header-container">
            <div class="site-header-bloginfo">
                <div class="site-header-bloginfo-title">
                    <a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
                </div>
                <div class="site-header-bloginfo-description">
                    <?php echo get_bloginfo('description'); ?>
                </div>
            </div>
            <!--<nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'menu-principal',
                ));
                ?>
            </nav>-->
            <!-- #site-navigation -->
        </div>
    </header>

    <div class="site-main">

        <div class="site-content">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <h1 class="entry-title <?php if (is_front_page()) echo 'pagina-inicial'; ?>"><?php the_title(); ?></h1>

                <?php
                        // Se é um post, exibe as meta informações.
                        if ( is_single() ) { ?>
                <div class=" entry-meta">
                    <div>Em <?php the_date(); ?>, por <?php the_author(); ?></div>
                </div>
                <?php
                        } ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

            </article>

            <?php
                endwhile;

            endif;
            ?>
        </div>

    </div><!-- .site-main -->

    <footer id="rodape" class="site-footer">
        <div class="site-footer-info">
            <div class="creditos">
                Copyright &copy; <?php echo date('Y'); ?>,
                <?php echo get_bloginfo('name'); ?>.
                Todos os direitos reservados.
            </div>
        </div>
    </footer>

    <?php
    wp_footer();
    ?>

</body>

</html>