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
                    <a href="/subscribe" class="bg-black duration-300 ease-in font-bold hover:bg-yellow hover:no-underline hover:text-black mx-auto px-6 py-2 rounded-md text-lg text-white lg:w-1/2"><?php _e( 'Subscribe', 'ilovebeinganerd' ); ?></a>
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <?php
                            PG_Smart_Walker_Nav_Menu::$options['template'] = '<a class="block border-grey duration-700 ease-in-out focus:underline hover:bg-yellow hover:font-semibold hover:text-black hover:text-bold py-5 text-2xl w-full lg:border-t-2 {CLASSES}" id="{ID}" {ATTRS}>{TITLE}</a>';
                            PG_Smart_Walker_Nav_Menu::$options['current_class'] = 'active';
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
            <div class="container max-w-[1080px]">
                <h1 class="my-8 text-center"><?php the_title(); ?></h1>
                <div class="mx-auto w-full lg:w-11/12">
                    <?php echo PG_Image::getPostImage( null, 'full', array(
                        	'class' => 'mx-auto rounded-md w-full',
                        	'sizes' => 'max-width(1024px) 92vw, max-width(1280px) 45vw, max-width(1536px) 38vw, 549px'
                    ), 'both', null ) ?>
                </div>
                <!-- start slipsum code -->
                <div class="flex items-center text-base"> 
                    <div class="mr-4">
                        <?php the_category( ' | ' ); ?>
                    </div>                     
                    <time class="mr-2 italic" datetime="2020-03-16">
                        <?php the_time( get_option( 'date_format' ) ); ?>
                    </time>                                          
                </div>
                <div class="mb-16 mt-4">
                    <?php the_content(); ?>
                </div>
                <!-- end slipsum code -->
            </div>             
            <div style="" class="lg:px-12">
</div>             
        </main>         
        <footer class="bg-grey flex flex-col mt-auto px-8 py-4 text-black lg:flex-row lg:justify-between lg:ml-64"> 
            <a href="<?php echo esc_url( home_url() ); ?>" class="font-semibold hover:underline py-2 lg:p-0"><?php _e( 'I Love Being a Nerd &copy;2021', 'ilovebeinganerd' ); ?></a> 
            <a href="https://sageninecreative.com" class="hover:underline py-2 lg:p-0" target="_pg_blank"><i class="hover:font-semibold"><?php _e( 'Site Build by Sage', 'ilovebeinganerd' ); ?> <?php _e( 'Nine', 'ilovebeinganerd' ); ?> <?php _e( 'Creative', 'ilovebeinganerd' ); ?></i></a> 
            <a href="<?php echo esc_url( get_page_link( PG_Helper::getPostFromSlug( 'privacy-policy', 'page' ) ) ); ?>" class="font-semibold hover:underline py-2 lg:p-0"><?php _e( 'Privacy Policy', 'ilovebeinganerd' ); ?></a> 
        </footer>        

<?php get_footer(); ?>