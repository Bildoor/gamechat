<?php
    /*
     * Template Name: Post
     */
    get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

    </header><!-- .entry-header -->

    <section class="entry-content container">
        <div class="row">
            <h1 class="col-xs-12">Posts</h1>
            <div class="col-xs-12">
                <?php
                    if(!isset($_GET['postId']))
                    {
                        echo get5LatestPosts("posts");
                    }
                    else
                    {
                        echo getSpecificPost($_GET['postId']);
                    }
                ?>
            </div>
        </div>
    </section><!-- .entry-content -->
</article><!-- #post-## -->

<?php get_footer(); ?>