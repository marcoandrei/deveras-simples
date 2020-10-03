<?php
/**
 * Página única do tema Deveras Simples.
 *
 * @package Deveras_Simples
 * @since 0.1
 */

 /**
  * Configurações do tema
  */

if ( ! function_exists( 'prepara_tema' ) ) : 

    function prepara_tema() {
        /* 
         * Carrega o "text-domain", o que permite que o tema seja traduzido.
         * 
         * Todos os itens traduzíveis de um tema devem ser escritos em Inglês
         * por força das melhores práticas do WordPress. Este tema tem alguns
         * itens que podem mudar de acordo com o idioma. Eles estarão escritos
         * em Inglês e está incluída um arquivo de tradução para PT-BR e PT-PT.
         * 
         *  
         */
        load_theme_textdomain( 'deveras-simples', get_template_directory() . '/languages' );
        
        // Habilita o RSS.
        add_theme_support( 'automatic-feed-links' );
        
        // Permite que o WordPress gerencie o título da página.
        add_theme_support( 'title-tag' );
        
    }
    add_action( 'after_setup_theme', 'prepara_tema' );

endif;
  
?>

<!-- Declarações de linguagem e idioma obrigatórias -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<!-- Cabeçalho padrão HTML -->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header id="cabecalho" class="site-header">

        <div class="site-header-container">

            <div class="site-header-bloginfo">

                <div class="site-header-bloginfo-title">
                    <?php
                    if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                    </h1>
                    <?php
                    else :
                        ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                    endif;
                    ?>

                </div>

                <div class="site-header-bloginfo-description">

                    <?php echo get_bloginfo('description'); ?>

                </div>

            </div>

            <nav id="navegacao" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'menu-principal',
                ));
                ?>
            </nav><!-- #site-navigation -->

        </div>

    </header>

    <main class="site-main">

        <div class="site-content">

            <div class="coluna-esquerda"></div>

            <div class="coluna-central">

                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <header>

                        <?php
                        if ( 'post' === get_post_type() ) :
                        ?>
                        <div class="entry-meta">
                            <?php the_date(); ?>
                        </div><!-- .entry-meta -->
                        <?php endif; ?>

                        <?php
                        if ( is_singular() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif;
                        ?>

                    </header>

                    <div class="entry-content">
                        <?php
                        if ( is_singular() ) :
                            the_content();
                        else :
                            
                            the_excerpt();
                            
                        endif;
                        ?>
                    </div>

                </article>

                <?php
                endwhile;
            endif;
            ?>

            </div>

            <div class="coluna-direita"></div>

        </div>

    </main><!-- .site-main -->

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