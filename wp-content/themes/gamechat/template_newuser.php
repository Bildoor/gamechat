<?php
    /*
     * Template Name: New User
     */
    get_header();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

    </header><!-- .entry-header -->

    <section class="entry-content container">
        <div class="row">
            <div class="col-md-7 col-sm-7 col-xs-12">
                <?php
                $posts = get_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'post_status' => 'publish',
                    'orderby' => 'post_date',
                    'oder' => 'DESC'
                ));

                if ( $posts ) :
                    foreach ( $posts as $post ) :
                        the_post;
                        $tags = wp_get_post_tags( $post->ID );?>

                        <article class="col-xs-12 question-post">
                            <h2 class="col-xs-8">
                                <a href="<?=get_the_permalink(); ?>">
                                    <?= get_the_title();?>
                                </a>
                            </h2>

                            <div class="col-xs-3 col-xs-offset-1 date text-right"><?= the_date(); ?></div>

                            <div class="col-xs-8">
                                <?php
                                foreach ($tags as $tag) : ?>
                                
                                <a href="/gamechat/index.php?page_id=35&tagId=<?=$tag->term_id?>"><span class="tags"># <?=$tag->name; ?></span></a>

                                <?php
                                endforeach;
                                ?>
                            </div>

                            <div class="col-xs-3 col-xs-offset-1">
                                <div class="col-xs-12 upvotes">
                                    <span><?=$post->likes?></span>
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                </div>

                                <div class="col-xs-12 comments">
                                    <span><?=$post->comment_count?></span>
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </div>
                            </div>
                        </article>
                    
                    <?php
                    endforeach;
                endif;
                    ?>
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