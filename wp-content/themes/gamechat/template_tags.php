<?php
    /*
     * Template Name: Tags
     */
    get_header();


    


    function getTagsFromPostId($tagId)
    {
        global $wpdb;
        $query = "SELECT name
                    FROM wp_term_relationships
                    JOIN wp_term_taxonomy
                    ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                    JOIN wp_terms
                    ON wp_terms.term_id = wp_term_taxonomy.term_id
                    WHERE object_id = '{$tagId}' AND taxonomy = 'post_tag'";

        $tags = $wpdb->get_results($query, OBJECT);

        $html = "";
        foreach($tags as $tag)
            $html .= "<span class='tags'># {$tag->name}</span>";


        return $html;
    }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

    </header><!-- .entry-header -->

    <section class="entry-content container">
        <div class="row">
            <h1 class="col-xs-12">Tags</h1>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <?php
                    if(isset($_GET['tagId']))
                    {
                        echo "<h2 class='col-xs-12'>All posts with #". get_tag($_GET['tagId'])->name . "</h2>";
                        echo getPostsFromTagId($_GET['tagId']);
                    }
                    else
                    {
                        echo printAllTags();
                    }
                ?>
            </div>

        </div>
    </section><!-- .entry-content -->
</article><!-- #post-## -->

<?php get_footer(); ?>