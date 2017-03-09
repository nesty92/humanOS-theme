<?php
/**
 *
 *  The template for displaying the footer
 *
 *  Contains the footer sidebars, social items,
 *  content copyright, theme copyright
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */
?>
        <footer>
            <?php
                $are_active_sidebras =  is_active_sidebar( 'footer-first' ) ||
                                        is_active_sidebar( 'footer-second' ) ||
                                        is_active_sidebar( 'footer-third' ) ||
                                        is_active_sidebar( 'footer-fourth' );

                if( $are_active_sidebras || (bool)get_theme_mod( 'mythemes-default-content', true ) ){
            ?>
                    <!-- footer sidebars -->
                    <aside class="mythemes-footer-sidebars">

                        <!-- the sidebars container ( align to center ) -->
                        <div class="container">
                            <div class="row">

                                <!-- first footer sidebar -->
                                <div class="col s12 m6 l3">
                                    <?php get_sidebar( 'footer-first' ); ?>
                                </div>

                                <!-- second footer sidebar -->
                                <div class="col s12 m6 l3">
                                    <?php get_sidebar( 'footer-second' ); ?>
                                </div>

                                <!-- third footer sidebar -->
                                <div class="col s12 m6 l3">
                                    <?php get_sidebar( 'footer-third' ); ?>
                                </div>

                                <!-- fourth footer sidebar -->
                                <div class="col s12 m6 l3">
                                    <?php get_sidebar( 'footer-fourth' ); ?>
                                </div>

                            </div>
                        </div><!-- .container -->
                    </aside><!-- .mythemes-footer-sidebars -->
            <?php
                }
            ?>

            <!-- dark mask social and copyright wrapper -->
            <div class="mythemes-dark-mask">

                <?php
                    $vimeo      = esc_url( get_theme_mod( 'mythemes-vimeo', 'http://vimeo.com/#' ) );
                    $twitter    = esc_url( get_theme_mod( 'mythemes-twitter', 'http://twitter.com/#' ) );
                    $skype      = esc_url( get_theme_mod( 'mythemes-skype' ) );
                    $renren     = esc_url( get_theme_mod( 'mythemes-renren' ) );
                    $github     = esc_url( get_theme_mod( 'mythemes-github' ) );
                    $rdio       = esc_url( get_theme_mod( 'mythemes-rdio' ) );
                    $linkedin   = esc_url( get_theme_mod( 'mythemes-linkedin' ) );
                    $behance    = esc_url( get_theme_mod( 'mythemes-behance', 'http://behance.com/#' ) );
                    $dropbox    = esc_url( get_theme_mod( 'mythemes-dropbox' ) );
                    $flickr     = esc_url( get_theme_mod( 'mythemes-flickr', 'http://flickr.com/#' ) );
                    $tumblr     = esc_url( get_theme_mod( 'mythemes-tumblr' ) );
                    $instagram  = esc_url( get_theme_mod( 'mythemes-instagram' ) );
                    $vkontakte  = esc_url( get_theme_mod( 'mythemes-vkontakte' ) );
                    $facebook   = esc_url( get_theme_mod( 'mythemes-facebook', 'http://facebook.com/#' ) );
                    $evernote   = esc_url( get_theme_mod( 'mythemes-evernote' ) );
                    $flattr     = esc_url( get_theme_mod( 'mythemes-flattr' ) );
                    $picasa     = esc_url( get_theme_mod( 'mythemes-picasa' ) );
                    $dribbble   = esc_url( get_theme_mod( 'mythemes-dribbble' ) );
                    $mixi       = esc_url( get_theme_mod( 'mythemes-mixi' ) );
                    $stumbl     = esc_url( get_theme_mod( 'mythemes-stumbleupon' ) );
                    $lastfm     = esc_url( get_theme_mod( 'mythemes-lastfm' ) );
                    $gplus      = esc_url( get_theme_mod( 'mythemes-gplus' ) );
                    $gcircle    = esc_url( get_theme_mod( 'mythemes-google-circles' ) );
                    $pinterest  = esc_url( get_theme_mod( 'mythemes-pinterest', 'http://pinterest.com/#' ) );
                    $smashing   = esc_url( get_theme_mod( 'mythemes-smashing' ) );
                    $soundcloud = esc_url( get_theme_mod( 'mythemes-soundcloud' ) );
                    $rss        = esc_url( get_theme_mod( 'mythemes-rss', esc_url( get_bloginfo('rss2_url') ) ) );
                ?>

                <?php
                    $social_items = !( empty( $vimeo ) && empty( $twitter ) && empty( $skype ) && empty( $renren ) && empty( $github ) &&
                                    empty( $rdio ) && empty( $linkedin ) && empty( $behance ) && empty( $dropbox ) && empty( $flickr ) &&
                                    empty( $tumblr ) && empty( $instagram ) && empty( $vkontakte ) && empty( $facebook ) && empty( $evernote ) &&
                                    empty( $flattr ) && empty( $picasa ) && empty( $dribbble ) && empty( $mixi ) && empty( $stumbl ) && empty( $lastfm ) &&
                                    empty( $gplus ) && empty( $gcircle ) && empty( $pinterest ) && empty( $smashing ) && empty( $soundcloud ) && empty( $rss ) );

                    if( $social_items ){
                ?>
                        <!-- social items -->
                        <div class="container mythemes-social">
                            <div class="row">

                                <div class="col s12">
                                    <?php
                                        if( !empty( $vimeo ) ){
                                            echo '<a href="' . esc_url( $vimeo ) . '" class="btn-floating waves-effect waves-light mythemes-icon-vimeo fa fa-vimeo-square" target="_blank"></a>';
                                        }

                                        if( !empty( $twitter ) ){
                                            echo '<a href="' . esc_url( $twitter ) . '" class="btn-floating waves-effect waves-light mythemes-icon-twitter fa fa-twitter-square" target="_blank"></a>';
                                        }

                                        if( !empty( $skype ) ){
                                            echo '<a href="' . esc_url( $skype ) . '" class="btn-floating waves-effect waves-light mythemes-icon-skype fa fa-skype-square" target="_blank"></a>';
                                        }

                                        if( !empty( $renren ) ){
                                            echo '<a href="' . esc_url( $renren ) . '" class="btn-floating waves-effect waves-light mythemes-icon-renren fa fa-renren-square" target="_blank"></a>';
                                        }

                                        if( !empty( $github ) ){
                                            echo '<a href="' . esc_url( $github ) . '" class="btn-floating waves-effect waves-light mythemes-icon-github fa fa-github-square" target="_blank"></a>';
                                        }

                                        if( !empty( $rdio ) ){
                                            echo '<a href="' . esc_url( $rdio ) . '" class="btn-floating waves-effect waves-light mythemes-icon-rdio fa fa-rdio-square" target="_blank"></a>';
                                        }

                                        if( !empty( $linkedin ) ){
                                            echo '<a href="' . esc_url( $linkedin ) . '" class="btn-floating waves-effect waves-light mythemes-icon-linkedin fa fa-linkedin-square" target="_blank"></a>';
                                        }

                                        if( !empty( $behance ) ){
                                            echo '<a href="' . esc_url( $behance ) . '" class="btn-floating waves-effect waves-light mythemes-icon-behance fa fa-behance-square" target="_blank"></a>';
                                        }

                                        if( !empty( $dropbox ) ){
                                            echo '<a href="' . esc_url( $dropbox ) . '" class="btn-floating waves-effect waves-light mythemes-icon-dropbox fa fa-dropbox-square" target="_blank"></a>';
                                        }

                                        if( !empty( $flickr ) ){
                                            echo '<a href="' . esc_url( $flickr ) . '" class="btn-floating waves-effect waves-light mythemes-icon-flickr fa fa-flickr-square" target="_blank"></a>';
                                        }

                                        if( !empty( $tumblr ) ){
                                            echo '<a href="' . esc_url( $tumblr ) . '" class="btn-floating waves-effect waves-light mythemes-icon-tumblr fa fa-tumblr-square" target="_blank"></a>';
                                        }

                                        if( !empty( $instagram ) ){
                                            echo '<a href="' . esc_url( $instagram ) . '" class="btn-floating waves-effect waves-light mythemes-icon-instagram fa fa-instagram-square" target="_blank"></a>';
                                        }

                                        if( !empty( $vkontakte ) ){
                                            echo '<a href="' . esc_url( $vkontakte ) . '" class="btn-floating waves-effect waves-light mythemes-icon-vkontakte fa fa-vkontakte-square" target="_blank"></a>';
                                        }

                                        if( !empty( $facebook ) ){
                                            echo '<a href="' . esc_url( $facebook ) . '" class="btn-floating waves-effect waves-light mythemes-icon-facebook fa fa-facebook-square" target="_blank"><i class="fa fa-facebook"></i></a>';
                                        }

                                        if( !empty( $evernote ) ){
                                            echo '<a href="' . esc_url( $evernote ) . '" class="btn-floating waves-effect waves-light mythemes-icon-evernote fa fa-evernote-square" target="_blank"></a>';
                                        }

                                        if( !empty( $flattr ) ){
                                            echo '<a href="' . esc_url( $flattr ) . '" class="btn-floating waves-effect waves-light mythemes-icon-flattr fa fa-flattr-square" target="_blank"></a>';
                                        }

                                        if( !empty( $picasa ) ){
                                            echo '<a href="' . esc_url( $picasa ) . '" class="btn-floating waves-effect waves-light mythemes-icon-picasa fa fa-picasa-square" target="_blank"></a>';
                                        }

                                        if( !empty( $dribbble ) ){
                                            echo '<a href="' . esc_url( $dribbble ) . '" class="btn-floating waves-effect waves-light mythemes-icon-dribbble fa fa-dribbble-square" target="_blank"></a>';
                                        }

                                        if( !empty( $mixi ) ){
                                            echo '<a href="' . esc_url( $mixi ) . '" class="btn-floating waves-effect waves-light mythemes-icon-mixi fa fa-mixi-square" target="_blank"></a>';
                                        }

                                        if( !empty( $stumbl ) ){
                                            echo '<a href="' . esc_url( $stumbl ) . '" class="btn-floating waves-effect waves-light mythemes-icon-stumbleupon" target="_blank"></a>';
                                        }

                                        if( !empty( $lastfm ) ){
                                            echo '<a href="' . esc_url( $lastfm ) . '" class="btn-floating waves-effect waves-light mythemes-icon-lastfm" target="_blank"></a>';
                                        }

                                        if( !empty( $gplus ) ){
                                            echo '<a href="' . esc_url( $gplus ) . '" class="btn-floating waves-effect waves-light mythemes-icon-gplus fa fa-gplus-square" target="_blank"></a>';
                                        }

                                        if( !empty( $gcircle ) ){
                                            echo '<a href="' . esc_url( $gcircle ) . '" class="btn-floating waves-effect waves-light mythemes-icon-google-circles fa fa-google-square" target="_blank"></a>';
                                        }

                                        if( !empty( $pinterest ) ){
                                            echo '<a href="' . esc_url( $pinterest ) . '" class="btn-floating waves-effect waves-light mythemes-icon-pinterest fa fa-pinterest-square" target="_blank"></a>';
                                        }

                                        if( !empty( $smashing ) ){
                                            echo '<a href="' . esc_url( $smashing ) . '" class="btn-floating waves-effect waves-light mythemes-icon-smashing fa fa-smashing-square" target="_blank"></a>';
                                        }

                                        if( !empty( $soundcloud ) ){
                                            echo '<a href="' . esc_url( $soundcloud ) . '" class="btn-floating waves-effect waves-light mythemes-icon-soundcloud fa fa-soundcloud-square" target="_blank"></a>';
                                        }

                                        if( !empty( $rss ) ){
                                            echo '<a href="' . esc_url( $rss ) . '" class="btn-floating waves-effect waves-light mythemes-icon-rss fa fa-rss-square" target="_blank"></a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div><!-- .mythemes-social -->
                <?php
                    }
                ?>

                <!-- copyright -->
                <div class="mythemes-copyright">

                    <!-- copyright container ( align to center ) -->
                    <div class="container">
                        <div class="row">

                            <div class="col s12">
                                <p>

                                    <?php
                                        /**
                                         *
                                         *  Content Copyright
                                         *  Customer can overwrite Content Copyright from the theme options
                                         *
                                         *  Appearance / Customize / Others - option "Content Copyright"
                                         */
                                    ?>

                                    <span class="copyright">humanOS es posible gracias a las comunidades de desarrollo de la UCI y la colaboración de la comunidad de software libre de Cuba.
										<?php //echo mythemes_validate_copyright( get_theme_mod( 'mythemes-copyright' , sprintf( __( 'Copyright &copy; %s %s. ') , date( 'Y' ) , esc_html( get_bloginfo( 'name' ) ) ) ) ); ?></span>

                                    <?php
                                        /**
                                         *
                                         *  Materialize WordPress Theme Copyright and Credit Link
                                         *
                                         *  We strongly recommend do not alter, modify, change or / and overwrite this section.
                                         *  Also we strongly recommend do not alter, modify, change or / and overwrite the visula
                                         *  appearance for this section by using css rules or JavaScript code.
                                         *
                                         *  Before make some changes to this section please consult
                                         *  the license terms of use. Also you can discus this with
                                         *  your law consultant.
                                         *
                                         *  @link : http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
                                         */
                                    ?>

                                    <span>	<?php //printf( __( 'Designed by %s.' , 'materialize' ) , '<a href="' . esc_url( mythemes_core::author( 'url' ) ) . '" target="_blank" title="' . esc_attr( mythemes_core::author( 'name' ) ) . '" class="mythemes">' . mythemes_core::author( 'name' ) . '</a>' ); ?></span>
                                </p>
                            </div>

                        </div>
                    </div><!-- .container -->
                </div><!-- .mythemes-copyright -->
            </div>

        </footer>

        <?php wp_footer(); ?>

    </body>
</html>
