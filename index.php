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

if (!function_exists('prepara_tema')) :

    function prepara_tema()
    {
        /* 
         * Carrega o "text-domain", o que permite que o tema seja traduzido.
         * 
         * Todos os itens traduzíveis de um tema devem ser escritos em Inglês
         * por força das melhores práticas do WordPress. Este tema terá alguns
         * itens que poderão mudar de acordo com o idioma. Eles estarão escritos
         * em Inglês, mas vou incluir um arquivo de tradução para PT-BR e PT-PT.
         * 
         *  
         */
        load_theme_textdomain('deveras-simples', get_template_directory() . '/languages');

        // Habilita o RSS.
        add_theme_support('automatic-feed-links');

        // Permite que o WordPress gerencie o título da página.
        add_theme_support('title-tag');
    }
    add_action('after_setup_theme', 'prepara_tema');

endif;

?>

<!-- Declarações de linguagem e idioma obrigatórias -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<!-- Cabeçalho padrão HTML -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
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
                    if (is_front_page() && is_home()) :
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                    </h1>
                    <?php
                    else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                            rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;
                    ?>

                </div>

                <div class="site-header-bloginfo-description">

                    <?php echo get_bloginfo('description'); ?>

                </div>

            </div>

        </div>

    </header>

    <main class="site-main">

        <div class="site-content">

            <div class="coluna-central">

                <?php

                if (have_posts()) : // Início do ciclo principal ("The Loop")
                    while (have_posts()) :
                        the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <header>

                        <?php
                                if (is_singular()) :
                                    the_title('<h1 class="entry-title">', '</h1>');
                                else :
                                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                endif;
                                ?>
                        <?php
                                if ('post' === get_post_type()) :
                                ?>
                        <div class="entry-meta">
                            <?php _e('by', 'deveras-simples'); ?> <?php the_author(); ?>
                            <?php _e('on', 'deveras-simples'); ?> <?php the_date(); ?>
                        </div><!-- .entry-meta -->
                        <?php endif; ?>

                    </header>

                    <div class="entry-content">
                        <?php
                                if (is_singular()) :

                                    // Se é o artigo individual, mostra o conteúdo.
                                    the_content();

                                else :
                                    // Se é o índice de artigos, mostra o resumo.
                                    the_excerpt();

                                endif;
                                ?>
                    </div>

                    <footer>

                        <?php
                                // Se é o artigo individual, exibe a navegação entre posts.

                                if (is_singular())
                                    the_post_navigation(
                                        array(
                                            'prev_text' => __('« %title', 'deveras-simples'),
                                            'next_text' => __('%title »', 'deveras-simples'),
                                            'screen_reader_text' => __('Continue Reading', 'deveras-simples'),
                                        )
                                    );
                                ?>



                    </footer>

                </article>



                <?php
                    endwhile; // Fim da ciclo principal

                    the_posts_pagination(
                        array(
                            'mid_size' => 2,
                            'prev_text' => __('«&nbsp;', 'deveras-simples'),
                            'next_text' => __('&nbsp;»', 'deveras-simples'),
                            'screen_reader_text' => __('Continue Reading', 'deveras-simples'),
                        )
                    );

                endif;
                ?>

            </div>

        </div>

    </main><!-- .site-main -->

    <footer id="rodape" class="site-footer">
        <div class="site-footer-info">
            <div class="creditos">
                <?php echo __('Copyright &copy; ', 'deveras-simples')  .  date('Y') . ', ' . get_bloginfo('name') . '. ' .  __('All rights reserved.', 'deveras-simples'); ?>
            </div>
        </div>
    </footer>

    <?php
    wp_footer();
    ?>

</body>

</html>