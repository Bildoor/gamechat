<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gamechat
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <h3>Navigation</h3>

                    <?php wp_nav_menu( array(
                            "menu_class" => "footer-menu",
                            'theme_location' => 'primary', 
                            'menu_id' => 'secondary-menu',
                            "menu" => "footer-menu, slug, footer-menu",
                            "container_class" => "footer-menu-container" 

                        )); 
                    ?>
                </div>

                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 social-buttons-wrapper">
                    <div class="col-md-12 col-sm-12 col-xs-4 social-button-holder">
                        <a href="//facebook.com/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-4 social-button-holder">
                        <a href="//twitter.com/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-4 social-button-holder">
                        <a href="//linkedin.com/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="col-xs-12 text-center">
                    <p>&copy; Copyright 2016 </p>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
