<?php
/*
 Template Name: Full Page Template
 Template Post Type: post, page
*/
?>
<?php get_header(); ?>

        <main class="flex-shrink-0 py-4">
            <div class="container max-w-[1080px]">
                <div class="mx-auto w-full sm:w-2/3 lg:w-1/3 xl:w-7/12">
                    <?php echo PG_Image::getPostImage( null, 'full', array(
                        	'class' => 'mx-auto rounded-md w-full',
                        	'sizes' => 'max-width(1024px) 92vw, max-width(1280px) 45vw, max-width(1536px) 38vw, 549px'
                    ), 'both', null ) ?>
                </div>
                <h1 class="mb-8 mt-2 text-center"><?php wp_title(); ?></h1>
                <!-- start slipsum code -->
                <div class="mx-auto">
                    <?php the_content(); ?>
                </div>
                <!-- end slipsum code -->
            </div>             
            <div style="" class="lg:px-12">
</div>             
        </main>         
        <footer class="bg-grey flex flex-col mt-auto px-8 py-4 text-black lg:flex-row lg:justify-between"> 
            <a href="<?php echo esc_url( home_url() ); ?>" class="font-semibold hover:underline py-2 lg:p-0"><?php _e( 'I Love Being a Nerd &copy;2021', 'ilovebeinganerd' ); ?></a> 
            <a href="https://sageninecreative.com" class="hover:underline py-2 lg:p-0" target="_pg_blank"><i class="hover:font-semibold"><?php _e( 'Site Build by Sage', 'ilovebeinganerd' ); ?> <?php _e( 'Nine', 'ilovebeinganerd' ); ?> <?php _e( 'Creative', 'ilovebeinganerd' ); ?></i></a> 
            <a href="<?php echo esc_url( get_page_link( PG_Helper::getPostFromSlug( 'privacy-policy', 'page' ) ) ); ?>" class="font-semibold hover:underline py-2 lg:p-0"><?php _e( 'Privacy Policy', 'ilovebeinganerd' ); ?></a> 
        </footer>        

<?php get_footer(); ?>