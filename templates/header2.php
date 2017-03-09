<?php
/**
 *
 *  The template for displaying the header image and the header elements
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

    // header headline and description
    $headline           = esc_html( get_theme_mod( 'mythemes-header-headline' , __( 'Best WordPress Theme based on Material Design' , 'materialize' ) ) );
    $description        = esc_html( get_theme_mod( 'mythemes-header-description' , __( 'Materialize is a freemium WordPress theme developed by myThem.es' , 'materialize' ) ) );

    // header height
    $height             = absint( get_theme_mod( 'mythemes-header-height' , 450 ) );

    /**
     *
     *  The header Mask and Transparency.
     *  The header Mask, by default, is a light transparent foil over the header image.
     *  This foil allow improve the contrast between header image and header elements
     */

    $mask_color         = esc_attr( get_theme_mod( 'mythemes-header-mask-color', '#ffffff' ) );
    $mask_transp        = floatval( absint( get_theme_mod( 'mythemes-header-mask-transp' , 75 ) ) / 100 );
    $mask_rgba          = 'rgba( ' . mythemes_tools::hex2rgb( esc_attr( $mask_color ) ) . ', ' . floatval( $mask_transp ) . ')';

    // header first button
    $btn_1_url          = esc_url( get_theme_mod( 'mythemes-header-btn-1-url', home_url( '#' ) ) );
    $btn_1_text         = esc_html( get_theme_mod( 'mythemes-header-btn-1-text', __( 'First Button', 'materialize' ) ) );
    $btn_1_description  = esc_attr( get_theme_mod( 'mythemes-header-btn-1-description', __( 'first button link description...', 'materialize' ) ) );

    // header second button
    $btn_2_url          = esc_url( get_theme_mod( 'mythemes-header-btn-2-url', home_url( '#' ) ) );
    $btn_2_text         = esc_html( get_theme_mod( 'mythemes-header-btn-2-text', __( 'Second Button', 'materialize' ) ) );
    $btn_2_description  = esc_attr( get_theme_mod( 'mythemes-header-btn-2-description', __( 'second button link description...', 'materialize' ) ) );

    // show / hide the header elements
    // the header headline ( show / hide )
    $show_headline      = (bool)get_theme_mod( 'mythemes-header-show-headline', true );

    // the header description ( show / hide )
    $show_description   = (bool)get_theme_mod( 'mythemes-header-show-description', true );

    // the header first button
    $show_btn_1         = (bool)get_theme_mod( 'mythemes-header-show-btn-1', true );

    // the header second button
    $show_btn_2         = (bool)get_theme_mod( 'mythemes-header-show-btn-2', true );
?>

<div class="col l12 mythemes-header valign-cell-wrapper overflow-wrapper parallax-container" style="height: 200px; margin-bottom: 10px;">
    <div class="valign-cell-wrapper" style="background: background: rgba( 255,255,255, 0.5);<?php //echo esc_attr( $mask_rgba ) ?>;">

        <!-- VERTICAL ALIGN CENTER -->
<!--        <div class="valign-cell">-->
<!---->
<!--            <div class="container">-->
<!--                <div class="row center">-->
<!--                    --><?php
////                   En el tamaño del primer div va esto      echo absint( $height );
////
////                    the header headline
////                        if( $show_headline ){
////                            echo '<a class="header-headline" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $headline . ' - ' . $description ) . '">';
////                            echo esc_html( $headline );
////                            echo '</a>';
////                        }
////
////                        // the header description
////                        if( $show_description ){
////                            echo '<a class="header-description" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $headline . ' - ' . $description ) . '">';
////                            echo esc_html( $description );
////                            echo '</a>';
////                        }
////
////                        // the header first button and second button
////                        if( $show_btn_1 || $show_btn_2 ){
////
////                            echo '<div class="mythemes-header-buttons">';
////
////                            // the header first button
////                            if( $show_btn_1 ){
////                                echo '<a href="' . esc_url( $btn_1_url ) . '" class="btn-large waves-effect waves-light mythemes-first-button" title="' . esc_attr( $btn_1_description ) . '">';
////                                echo esc_html( $btn_1_text );
////                                echo '</a>';
////                            }
////
////                            // the header second button
////                            if( $show_btn_2 ){
////                                echo '<a href="' . esc_url( $btn_2_url ) . '" class="btn-large waves-effect waves-light mythemes-second-button" title="' . esc_attr( $btn_2_description ) . '">';
////                                echo esc_html( $btn_2_text );
////                                echo '</a>';
////                            }
////
////                            echo '</div>';
////                        }
////                    ?>
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
    </div>

    <div class="slider">
        <ul class="slides">

        <?php
        $lastposts = get_posts( array(
            'posts_per_page' => 4,
            'category' => 117
        ) );

        if ( $lastposts ) {
            foreach ( $lastposts as $post ) :
                setup_postdata( $post ); ?>

                <?php
                $thumbID = get_post_thumbnail_id( $post->ID );
                $imgDestacada = wp_get_attachment_url( $thumbID );
//                $arr=array("center-align","left-align","right-align");


                ?>
            <li>

                <div class="container">
                    <div class="row" >
                        <div class="col l3 m4 s6 hide-on-small-only">
                            <img src="<?php echo $imgDestacada?>">
                        </div>
                        <div class="col  l8 m8 s12 "  >
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
<!--                            <h6 class="">--><?php //the_excerpt();?><!--</h5>-->
                            <p>
                                <i class="zmdi zmdi-account-circle mdc-text-grey"></i> Por: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"
                                   class="fn"><?php echo wp_trim_words(get_the_author(), 1, ''); ?></a>
                                <time class="updated" data-toggle="tooltip" datetime="<?php echo get_the_time('c'); ?>"
                                      title="<?php echo get_the_date(); ?>">
                                    | <i class="zmdi zmdi-calendar mdc-text-grey"></i> <?php echo shoestrap_human_time_diff(get_the_time('U'), current_time('timestamp')); ?></time>

                                <span class="article-comments">| <i class="zmdi zmdi-comments mdc-text-grey"></i>  <a
                                        href="<?php echo get_comments_link() ?>"
                                        title="<?php echo esc_attr(sprintf(__('Comment on %s'), get_the_Title())) ?>"
                                        rel="tooltip"><?php comments_number() ?></a></span>
                                <?php if(function_exists('the_views')) { ?>
                                    <?php
                                    $views = (int)the_views(false);
                                    switch($views){
                                        case 0:
                                            $text = "No ha sido leído";
                                            break;
                                        case 1:
                                            //
                                            $text = "Leído una vez";
                                            break;
                                        default:
                                            //
                                            $text = "Leído $views veces";
                                            break;
                                    }
                                    ?>
                                    | <i class="zmdi zmdi-eye mdc-text-grey"></i>&nbsp;<?php echo $text ?>
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </li>


                <?php
            endforeach;
            wp_reset_postdata();
        }?>

        </ul>
    </div>

    <?php

        /**
         *
         *  The header Image.
         *  Header image is based on the WordPress API functions.
         */

        $image = esc_url( get_header_image() );

        if( !empty( $image ) ){
            echo '<div class="parallax" style="background-image: url(' . esc_url( $image ) . ' );">';
            echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $headline . ' - ' . $description ) . '">';
            echo '</div>';
        }
    ?>
</div>
