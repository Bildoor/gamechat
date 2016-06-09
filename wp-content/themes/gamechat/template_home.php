<?php
    /*
     * Template Name: Home
     */
    get_header();

    global $wpdb;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

    </header><!-- .entry-header -->

    <section class="entry-content container">
        <div class="row">
            <h1 class="col-xs-12">Welcome to GameChat</h1>

            <div class="col-md-7 col-sm-7 col-xs-12">
                <?=get5LatestPosts()?>
            </div>

            <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12">
                <aside class="col-xs-12">
                    <h2 class="col-xs-12">Most active users</h2>

                    <ol class="col-xs-12 active-user-list">
                        
                        <?=getTop5Users()?>
                    </ol>
                </aside>

                <aside class="col-xs-12">
                    <h2 class="col-xs-12">Most popular tags</h2>
                    <ol class="col-md-12 col-sm-12 col-xs-6" id="top-tags">
                        <?=getTop5Tags()?>
                    </ol>
                </aside>

            </div>
        </div>
    </section><!-- .entry-content -->
</article><!-- #post-## -->

<?php get_footer(); ?>