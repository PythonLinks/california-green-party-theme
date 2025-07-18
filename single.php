<?php
/** 
 * The single post.<br>
 * This file works as display full post content page and its comments.
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();
get_sidebar();
?>
                <main id="main" class="col-md-9 col-lg-6  order-6 site-main" role="main">
                    <?php
                    if (have_posts()) {
                        $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content', get_post_format());
                            echo "\n\n";

                            $Bsb4Design->pagination();
                            echo "\n\n";

                            // display next/previous post. un-comment the code below to display post navigation.
                            // @since 1.2.6
                            // get_template_part('template-parts/nextprevious-post');

                            // If comments are open or we have at least one comment, load up the comment template
                            if (comments_open() || '0' !== strval(get_comments_number())) {
                                comments_template();
                            }
                            echo "\n\n";
                        }// endwhile;

                        
                        unset($Bsb4Design);
                    } else {
                        get_template_part('template-parts/section', 'no-results');
                    }// endif;
                    ?> 
                </main>
<?php
get_sidebar('right');
get_footer();