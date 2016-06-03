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
                <div class="col-md-3 col-sm-3 col-xs-12 social-buttons-wrapper">
                    <div class="col-md-12 col-xs-4 social-button-holder">
                        <a href="//facebook.com/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-12 col-xs-4 social-button-holder">
                        <a href="//twitter.com/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-12 col-xs-4 social-button-holder">
                        <a href="//linkedin.com/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                    </div>
                    
                    
                </div>
                <hr class="col-xs-12 hidden-md" style="color:red;"/>
                <div class="col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-12">
                    <?php wp_nav_menu( array(
                            "menu_class" => "footer-menu",
                            'theme_location' => 'primary', 
                            'menu_id' => 'secondary-menu',
                            "menu" => "footer-menu, slug, footer-menu",
                            "container_class" => "footer-menu-container" 

                        )); 
                    ?>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
