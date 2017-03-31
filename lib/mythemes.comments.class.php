<?php
if( !class_exists( 'mythemes_humanos_comments' ) ){

class mythemes_humanos_comments
{
	/* DUSQUSE */
	/* FACEBOOK */
	/* WORDPRESS */
	static function classic( $comment, $args, $depth )
    {
        $deff = get_template_directory_uri() . '/media/_frontend/img/default-avatar.png';

        $GLOBALS['comment'] = $comment;
        switch ( $comment -> comment_type ) {
            case '' : {
                echo '<li '; comment_class(); echo' id="li-comment-'; comment_ID(); echo '">';
                echo '<div id="comment-'; comment_ID(); echo '" class="comment-box">';
                echo '<header>';



                //echo get_avatar( $comment -> comment_author_email , 44  , $deff );
								if(function_exists('dislike_counter_c')) { dislike_counter_c(''); }
								if(function_exists('like_counter_c')) { like_counter_c(''); }
                echo '<span class="comment-meta">';



                comment_reply_link( array_merge( $args , array(
                    'reply_text'    => __( 'Responder', 'materialize' ),
                    'before'        => '<span class="comment-replay waves-effect waves-light human">',
                    'after'         => '</span>',
                    'depth'         => (int)$depth
                )));

								echo  '<span class="comment-replay  waves-effect waves-light human">';
								echo '<a rel="nofollow" class="comment-quote-link" href="#respond">Citar</a>';
								echo '</span>';
				echo '<span class="right comment-date waves-effect waves-light" datetime="' . esc_attr( get_comment_date( 'Y-m-d' , $comment -> comment_ID ) ) . '" class="comment-time">';
                echo get_comment_date( esc_attr( get_option( 'date_format' )." g:i a" ) , $comment -> comment_ID );
                echo '</span>';

				if (function_exists("wpua_custom_output"))  {
					echo '<span class="wpua right valign-wrapper waves-effect waves-light">';
						wpua_custom_output();
					echo 	'</span>';
				}
                echo '</span>';
                echo '<cite>';
                echo get_comment_author_link( $comment -> comment_ID );
                echo '</cite>';
                echo '<div class="clear"></div>';
                echo '</header>';

                echo '<div class="comment-quote">';
                if ( $comment -> comment_approved == '0' ) {
                    echo '<em class="comment-awaiting-moderation">';
                    _e( 'Su comentario esta en moderación.' , 'materialize' );
                    echo '</em>';
                }
                echo get_comment_text();
                echo '</div>';
                echo '</div>';
                break;
            }
            default : {
                echo '<li '; comment_class(); echo' id="li-comment-'; comment_ID(); echo '">';
                echo '<div id="comment-'; comment_ID(); echo '" class="comment-box">';

                echo '<span class="comment-meta">';
                echo '<time datetime="' . esc_attr( get_comment_date( 'Y-m-d' , $comment -> comment_ID ) ) . '" class="comment-time">';
                echo get_comment_date( esc_attr( get_option( 'date_format' )." g:i a" ) , $comment -> comment_ID );
                echo '</time>';

                echo '</span>';
                echo '<cite>';
                echo get_comment_author_link( $comment -> comment_ID );
                echo '</cite>';
                echo '<div class="clear"></div>';
                echo '</header>';

                echo '<div class="comment-quote">';
                echo get_comment_text();
                echo '</div>';
                echo '</div>';
                break;
            }
        }
    }
}

}   /* END IF CLASS EXISTS */
?>
