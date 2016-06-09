<?php
    /*
     * Template Name: User
     */

    if (!is_user_logged_in()) 
    {
        wp_redirect( wp_login_url( get_the_permalink() ) );
        exit();
    }

    if(isset($_POST['submit']))
    {

        wp_update_user(array(
            'ID' => get_current_user_id(),
            'user_email' => $_POST["email"],
            'first_name' => $_POST["firstname"],
            'last_name' => $_POST["lastname"],
            'display_name' => $_POST["displayname"]
        ));

    }

    get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

    </header><!-- .entry-header -->

    <section class="entry-content container">
        <div class="row">
            <h1 class="col-xs-12">Account</h1>

            <?php
                if( !isset( $_GET["userid"]) || intval($_GET["userid"]) === $current_user->ID )
                {
                    $user = wp_get_current_user();
                    $userInfo = <<<EOD
                        <div class="col-xs-12">
                            <h2 class="col-xs-12">Administrative panel</h2>
                            <form method="POST">
                                ID:
                                <input type="number" name="userid" readonly disabled value="{$user->ID}" />
                                Username:
                                <input type="text" name="username" readonly disabled value="{$user->user_login}" />
                                Email:
                                <input type="text" name="email" value="{$user->user_email}" />
                                Firstname:
                                <input type="text" name="firstname" value="{$user->user_firstname}" />
                                Lastname:
                                <input type="text" name="lastname" value="{$user->user_lastname}" />
                                Display name:
                                <input type="text" name="displayname" value="{$user->display_name}" />
                                <input type="submit" name="submit" value="Save changes">
                            </form>
                        </div>
EOD;
                    echo $userInfo;
                }
            ?>

            <h2 class="col-xs-12">
                Most recent posts
            </h2>

            <?php
                $posts = get_posts(array(
                    'posts_per_page' => 5,
                    'author' => (isset($_GET['userid'])) ? $_GET['userid'] : $current_user->ID,
                    'offset' => (!empty($_GET['offset'])) ? $_GET['offset'] : 0

                ));

                $postContent = "";
                foreach($posts as $post)
                {
                    $postContent =  <<<EOD
                        <article class="col-xs-12 question-post">
	                        <h2 class="col-xs-8">
		                        <a href="{$post->guid}">
			                        {$post->post_title}
		                        </a>
	                        </h2>

	                        <div class="col-xs-3 col-xs-offset-1 date text-right">{$post->post_date}</div>

	                        <div class="col-xs-8">
EOD;
                    $postTags = wp_get_post_tags($post->ID);
			        foreach ($postTags as $tag)
				        $postContent .= '<span class="tags"># '. $tag->name .' </span>';

                    $postContent .= <<<EOD
                            </div>

                            <div class="col-xs-3 col-xs-offset-1">
                                <div class="col-xs-12 upvotes">
                                    <span>42</span>
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
                echo ($postContent === "") ? "<p class='col-xs-12'>No post written</p>" : $postContent;

            ?>
            <h2 class="col-xs-12">Most recent comments</h2>
            <?php
                $comments = get_comments(array(
                    'orderby' => 'comment_date',
                    'offset' => (!empty($_GET['offset'])) ? $_GET['offset'] : 0,
                    'number' => 5,
                    'author__in' => [(isset($_GET['userid'])) ? $_GET['userid'] : $current_user->ID]
                ));


                $html = "";
                foreach($comments as $comment)
                {
                    $html .= "<h2>{$comment->comment_author}</h2>";
                    $html .= "<div>{$comment->comment_content}</div>";
                    $html .= "<div>{$comment->comment_date}</div>";
                }

                echo ($html === "") ? "<p class='col-xs-12'>No comments written</p>" : $html;
            ?>
        </div>
    </section><!-- .entry-content -->
</article><!-- #post-## -->

<?php get_footer(); ?>