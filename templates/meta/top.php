<?php
/**
 *
 *  The template part for displaying top post meta
 *  The top post meta containing the post date,
 *  post categories, post author and number of coments.
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

    if( (bool)get_theme_mod( 'mythemes-top-meta', true ) ){
?>
        <div class="mythemes-top-meta meta">

            <!-- date -->
            <?php
                $t_time = get_post_time( 'Y-m-d h:i A', false , $post -> ID  );
                $u_time = get_post_time( esc_attr( get_option( 'date_format' ) ), false , $post -> ID,true );
            ?>

            <time datetime="<?php echo esc_attr( $t_time ); ?>"><i class="mythemes-icon-calendar"></i><?php echo sprintf( __( 'Publicado el %s' , 'humanOS' ), $u_time, false, $post -> ID, true ); ?></time>

            <div class="clear"></div>

            <!-- author -->
            <?php $name = wp_trim_words(get_the_author(), 1, '');//get_the_author_meta( 'display_name' , $post -> post_author ); ?>
            <a class="author waves-effect waves-dark" href="<?php if($post->post_type!='question')echo esc_url( get_author_posts_url( $post-> post_author ) ); else echo '#'?>" title="<?php echo sprintf( __( 'Writed by %s' , 'materialize' ) , esc_attr( $name ) ); ?>">
                <i class="zmdi zmdi-account-circle mdc-text-grey"></i><?php echo sprintf( __( 'Por %s' , 'HumanOS' ) , esc_html( $name ) ); ?>
            </a>

            <!-- categories -->
            <?php the_category(); ?>


            <!-- comments -->
            <?php
                if( $post -> comment_status == 'open' ) {
                    $nr = absint( get_comments_number( $post -> ID ) );
                    echo '<a class="comments waves-effect waves-dark" href="' . esc_url( get_comments_link( $post -> ID ) ) . '">';
                    echo '<i class="zmdi zmdi-comments zmdi-hc-fw"></i>';
                    echo sprintf( _nx( '%s' , '%s' , absint( $nr ) , 'Number of comment(s) from post meta' , 'HumanOS' ) , number_format_i18n( $nr ) );
                    echo '</a>';
                }
            ?>
        </div><!-- .mythemes-top-meta -->
<?php
    }
?>
