<?php get_header(); ?>

<header>
    <nav class="bg-purple flex flex-col h-full overflow-x-hidden py-4 text-center text-white lg:fixed lg:left-0 lg:pb-4 lg:pt-16 lg:top-0 lg:w-64 lg:z-10">
        <div class="flex items-center justify-between px-4 lg:p-0">
            <a href="https://ilovebeinganerd.com" class="text-left lg:text-center"> <h1><?php bloginfo( 'name' ); ?></h1> </a>
            <button aria-expanded="false" aria-label="Open the menu" aria-controls="menu" class="lg:hidden">
                <i id="toggle" class='fas fa-bars fa-2x pt-3 pl-3'></i>
            </button>
        </div>
        <div id="menu" class="duration-700 ease-in-out pt-8 lg:flex lg:flex-col" hidden>
            <a href="<?php echo get_theme_mod( 'homepage_content_Subscribe Button Link', '/subscribe' ); ?>" class="bg-black duration-300 ease-in font-bold hover:bg-yellow hover:no-underline hover:text-black mx-auto px-6 py-2 rounded-md text-lg text-white lg:w-1/2"><?php echo get_theme_mod( 'homepage_content_Subscribe Button', __( 'Subscribe', 'ilovebeinganerd' ) ); ?></a>
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <?php
                    PG_Smart_Walker_Nav_Menu::$options['template'] = '<a class="block border-grey duration-700 ease-in-out focus:underline hover:bg-yellow hover:font-semibold hover:text-black hover:text-bold py-5 text-2xl w-full lg:border-t-2 {CLASSES}" id="{ID}" {ATTRS}>{TITLE}</a>';
                    PG_Smart_Walker_Nav_Menu::$options['current_class'] = 'current-menu-item';
                    wp_nav_menu( array(
                    	'container' => '',
                    	'theme_location' => 'primary',
                    	'items_wrap' => '<div class="%2$s lg:mt-8 lg:p-0 pt-8" id="%1$s">%3$s</div>',
                    	'walker' => new PG_Smart_Walker_Nav_Menu()
                ) ); ?>
            <?php endif; ?>
        </div>
    </nav>
</header>
<main class="flex-shrink-0 py-4 lg:ml-64">
    <div class="bg-black pt-8 px-4 relative sm:px-6 lg:px-8 lg:py-16">
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="font-bold text-3xl tracking-tight sm:text-4xl"><?php echo get_theme_mod( 'homepage_content_Headline', __( 'Latest Posts', 'ilovebeinganerd' ) ); ?></h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl sm:mt-4"><?php echo get_theme_mod( 'homepage_content_Subheadline', 'Make sure you <a href="/subscribe">subscribe </a>to keep up with the nerdery!' ); ?></p>
            </div>
            <?php if ( have_posts() ) : ?>
                <div class="gap-5 grid max-w-lg mt-12 mx-auto lg:grid-cols-2 lg:max-w-none xl:grid-cols-3">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php PG_Helper::rememberShownPost(); ?>
                        <div <?php post_class( 'blog-shadow duration-700 ease-in-out flex flex-col overflow-hidden rounded-lg lg:hover:scale-105' ); ?> id="post-<?php the_ID(); ?>">
                            <div class="flex-shrink-0">
                                <?php echo PG_Image::getPostImage( null, 'post-thumbnail', array(
                                    	'class' => 'h-48 w-full object-cover',
                                    	'sizes' => 'max-width(480px) 90vw, max-width(768px) 512px, max-width(1024px) 52vw, max-width(1280px) 36vw, max-width(1536px) 25vw, 413px'
                                ), 'both', null ) ?>
                            </div>
                            <div class="flex-1 p-6 flex flex-col justify-between">
                                <h3 class="text-xl text-gray-900"><?php the_title(); ?></h3>
                                <div>
                                    <?php the_category( ' | ' ); ?>
                                </div>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-16">
                                        <?php the_time( get_option( 'date_format' ) ); ?>
                                    </time>
                                </div>
                                <div class="flex-1">
                                    <p class="mt-3 text-base text-gray-500"><?php echo get_the_excerpt(); ?></p>
                                </div>
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn text-center lg:mx-auto"><?php _e( 'Read More', 'ilovebeinganerd' ); ?></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'ilovebeinganerd' ); ?></p>
            <?php endif; ?>
        </div>
        <?php if ( PG_Pagination::isPaginated() ) : ?>
            <div class="flex flex-col h-auto justify-between max-w-[800px] mt-16 mx-auto md:flex-row"> 
                <?php if( PG_Pagination::getCurrentPage() > 1 ) : ?>
                    <a class="btn my-4 md:m-0" <?php echo PG_Pagination::getPreviousHrefAttribute(); ?>><?php _e( '&lt; Previous Page', 'ilovebeinganerd' ); ?></a>
                <?php endif; ?>
                <div class="self-center text-2xl">
                    <?php _e( 'Page', 'ilovebeinganerd' ); ?>
                    <span><?php echo PG_Pagination::getCurrentPage(); ?></span>
                    <?php _e( 'of', 'ilovebeinganerd' ); ?>
                    <span><?php echo PG_Pagination::getMaxPages(); ?></span>
                </div>
                <?php if( PG_Pagination::getCurrentPage() < PG_Pagination::getMaxPages() ) : ?>
                    <a class="btn my-4 md:m-0" <?php echo PG_Pagination::getNextHrefAttribute(); ?>><?php _e( 'Next Page &gt;', 'ilovebeinganerd' ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>
<footer class="bg-grey flex flex-col mt-auto px-8 py-4 text-black lg:flex-row lg:justify-between lg:ml-64">
    <a href="<?php echo esc_url( home_url() ); ?>" class="font-semibold hover:underline py-2 lg:p-0"><?php _e( 'I Love Being a Nerd &copy;2021', 'ilovebeinganerd' ); ?></a>
    <a href="https://sageninecreative.com" class="hover:underline py-2 lg:p-0" target="_blank"><i class="hover:font-semibold"><?php _e( 'Site Build by Sage', 'ilovebeinganerd' ); ?> <?php _e( 'Nine', 'ilovebeinganerd' ); ?> <?php _e( 'Creative', 'ilovebeinganerd' ); ?></i></a>
    <a href="<?php echo esc_url( get_page_link( PG_Helper::getPostFromSlug( 'privacy-policy', 'page' ) ) ); ?>" class="font-semibold hover:underline py-2 lg:p-0"><?php _e( 'Privacy Policy', 'ilovebeinganerd' ); ?></a>
</footer>        

<?php get_footer(); ?>