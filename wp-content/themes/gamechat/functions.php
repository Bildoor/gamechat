<?php
/**
 * Gamechat functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gamechat
 */

if ( ! function_exists( 'gamechat_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gamechat_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Gamechat, use a find and replace
	 * to change 'gamechat' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gamechat', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'gamechat' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gamechat_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'gamechat_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gamechat_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gamechat_content_width', 640 );
}
add_action( 'after_setup_theme', 'gamechat_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gamechat_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gamechat' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gamechat' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gamechat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gamechat_scripts() {
	wp_enqueue_style( 'gamechat-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gamechat-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gamechat-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gamechat_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// custom scripts bby
function custom_script_loader()
{
	// Remove shitty ass jquery, replace with local
	wp_deregister_script('jquery');

	// load Vendor scripts
	wp_enqueue_script('vendorjs', get_template_directory_uri() . '/project.vendor.min.js');

	// Load core.js
	wp_enqueue_script('corejs', get_template_directory_uri() . '/project.core.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts','custom_script_loader');

function getTop5Users()
{
    global $wpdb;
    $query = "SELECT * FROM wp_users ORDER BY activitycount DESC LIMIT 5";
    $users = $wpdb->get_results($query, OBJECT);

    $html = "";
    foreach($users as $user)
        $html .= "
                            <li class='col-md-12 col-sm-12 col-xs-6'>
                                <a href='/gamechat/?page_id=37&userid={$user->ID}'>
                                    <div class='profile-picture' style='background-image: URL(". get_avatar_url($user->ID) .");'></div>
                                    <span class='profile-username'>{$user->display_name}</span>
                                </a>
                            </li>";
    return $html;
}

function getTop5Tags()
{
    global $wpdb;
    $query = "SELECT * FROM wp_term_relationships
                    JOIN wp_term_taxonomy
                    ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                    JOIN wp_terms
                    ON wp_terms.term_id = wp_term_taxonomy.term_id
                    WHERE name != 'Top menu' AND  name != 'Okategoriserade'
                    GROUP BY name
                    ORDER BY count(*) DESC LIMIT 5"
                ;


    $tags = $wpdb->get_results($query, OBJECT);

    $html = "";
    foreach($tags as $tag)
        $html .= "<li>
                        <a href='/gamechat/?pageId=35&tagId={$tag->term_id}'><span class='tags'># {$tag->name}</span></a>
                      </li>";

    return $html;
}
function get5LatestPosts($site = "")
{
    $posts = get_posts(array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'orderby' => 'post_date',
                'oder' => 'DESC'
            ));


    $html = "";

    if($posts)
    {
        foreach($posts as $post)
        {
            $html .= <<<EOD
                                <article class="col-xs-12 question-post">
                            <h2 class="col-xs-8">
                                <a href="/gamechat/?page_id=33&postId={$post->ID}">
                                    {$post->post_title}
                                </a>
                            </h2>

                            <div class="col-xs-3 col-xs-offset-1 date text-right">
EOD;
                $html .= date("Y-m-d", strtotime($post->post_date));
                $html .= <<<EOD
                            </div>

EOD;
                if($site === "posts")
                {
                    $html .= "<div class='col-xs-12'>{$post->post_content}</div>";
                }


                $html .= <<<EOD
                            <div class="col-xs-8">
EOD;

            $tags = wp_get_post_tags( $post->ID );
            foreach ($tags as $tag)
                $html .= '<a href="/gamechat/index.php?page_id=35&tagId='. $tag->term_id .'"><span class="tags"># '. $tag->name .'</span></a>';

            $html .= <<<EOD
                            </div>

                            <div class="col-xs-3 col-xs-offset-1">
                                <div class="col-xs-12 upvotes">
                                    <span>{$post->likes}</span>
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                </div>

                                <div class="col-xs-12 comments">
                                    <span>{$post->comment_count}</span>
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </div>
                            </div>
                        </article>
EOD;
        }
    }

    return $html;
}

function getPostsFromTagId($id)
{
    global $wp_query;
    $args = array(
            'tag__in' => $id,
            'posts_per_page' => -1
        );

    $posts = get_posts($args);

    $html = "";

    if($posts)
    {
        foreach($posts as $post)
        {
            $html .= <<<EOD
                                <article class="col-xs-12 question-post">
                            <h2 class="col-xs-8">
                                <a href="/gamechat/?page_id=33&postId={$post->ID}">
                                    {$post->post_title}
                                </a>
                            </h2>

                            <div class="col-xs-3 col-xs-offset-1 date text-right">
EOD;
            $html .= date("Y-m-d", strtotime($post->post_date));
            $html .= <<<EOD
                            </div>
                            <div class="col-xs-8">
EOD;

            $tags = wp_get_post_tags( $post->ID );
            foreach ($tags as $tag)
                $html .= '<a href="/gamechat/index.php?page_id=35&tagId='. $tag->term_id .'"><span class="tags"># '. $tag->name .'</span></a>';

            $html .= <<<EOD
                            </div>

                            <div class="col-xs-3 col-xs-offset-1">
                                <div class="col-xs-12 upvotes">
                                    <span>{$post->likes}</span>
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                </div>

                                <div class="col-xs-12 comments">
                                    <span>{$post->comment_count}</span>
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </div>
                            </div>
                        </article>
EOD;
        }
    }

    return $html;

}

function printAllTags()
{

    global $wpdb;
    $query = "SELECT * FROM wp_term_relationships
                    JOIN wp_term_taxonomy
                    ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                    JOIN wp_terms
                    ON wp_terms.term_id = wp_term_taxonomy.term_id
                    WHERE name != 'Top menu' AND  name != 'Okategoriserade'
                    GROUP BY name
                    ORDER BY count(*) DESC LIMIT 5"
                ;


    $tags = $wpdb->get_results($query, OBJECT);

    $html = "";

    foreach($tags as $tag)
        $html .= '<a href="/gamechat/index.php?page_id=35&tagId='. $tag->term_id .'"><span class="tags"># '. $tag->name .'</span></a>';

    return $html;
}

function getSpecificPost($id = null)
{
    $post = get_post($id);

    $html = "
        <article class='col-xs-12'>
            <h2 class='col-xs-9'>{$post->post_title}</h2><span class='col-xs-2 col-xs-offset-1'>". date("Y-m-d", strtotime($post->post_date)) ."</span>
            <div class='col-xs-12'>{$post->post_content}</div>

            <div class='col-xs-8'>
            ";
            $tags = wp_get_post_tags( $post->ID );
            foreach ($tags as $tag)
                $html .= '<a href="/gamechat/index.php?page_id=35&tagId='. $tag->term_id .'"><span class="tags"># '. $tag->name .'</span></a>';

            $html .= "
            <hr class='col-xs-12'>
            </div>
            <div class='col-xs-3 col-xs-offset-1'>
                <div class='col-xs-12 upvotes'>
                    <span>{$post->likes}</span>
                    <i class='fa fa-thumbs-up' aria-hidden='true'></i>
                </div>

                <div class='col-xs-12 comments'>
                    <span>{$post->comment_count}</span>
                    <i class='fa fa-comments' aria-hidden='true'></i>
                </div>
            </div>
        </article>
    ";

            return $html;
}