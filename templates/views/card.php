<?php
/**
 *
 *  The template part for displaying blog post classic view
 *
 * @package WordPress
 * @subpackage Materialize
 * @since Materialize 1.0
 */

global $post, $posts_total, $posts_index;
?>
<!-- post content wrapper -->
<div class="col s12 m6 l4 xl3 post">
    <div class="card medium">
		<div class="card-image waves-effect waves-block waves-light">
		    <?php
		    // post thumbnail
		    $p_thumbnail = get_post(get_post_thumbnail_id($post->ID));

		    if (has_post_thumbnail($post->ID) && isset($p_thumbnail->ID)) {
		        ?>


		            <?php
		            // the post thumbnail
		            echo get_the_post_thumbnail($post->ID, 'mythemes-classic', array(
		                'alt' => mythemes_post::title($post->ID, true),
		                'class' => 'activator'
		            ));
		            ?>


		        <?php
		    }else{ ?>
				<img alt="portada" class="activator" src="<?php echo get_stylesheet_directory_uri(); ?>/media/_frontend/img/portada.png">
			<?php } ?>
		</div>
        <div class="card-content">

        <span class="card-title activator">
           <i class="zmdi zmdi-hc-2x zmdi-more-vert right"></i>
           <a href="<?php the_permalink() ?>"
              title="<?php echo mythemes_post::title($post->ID, true); ?>">
            <?php if (!empty($post->post_title)) {
                echo wp_trim_words(mythemes_post::title($post->ID, true), 8, '...');
            }
            ?>
            </a>
  	  </span>
            <p>
                <i class="zmdi zmdi-account-circle mdc-text-grey"></i> Por: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"
                   class="fn"><?php echo wp_trim_words(get_the_author(), 1, ''); ?></a>
                <time class="updated" data-toggle="tooltip" datetime="<?php echo get_the_time('c'); ?>"
                      title="<?php echo get_the_date(); ?>">
                    | <i class="zmdi zmdi-calendar mdc-text-grey"></i> <?php echo shoestrap_human_time_diff(get_the_time('U'), current_time('timestamp')); ?></time>

                <span class="article-comments">| <i class="zmdi zmdi-comments mdc-text-grey"></i>  <a
                        href="<?php echo get_comments_link() ?>"
                        title="<?php echo esc_attr(sprintf(__('Comment on %s'), get_the_Title())) ?>"
                        rel="tooltip"><?php comments_number( '0', '1', '%' ); ?></a></span>
                <?php if(function_exists('the_views')) { ?>
                    <?php
                    $views = (int)the_views(false);
                    // switch($views){
                    //     case 0:
                    //         $text = "No ha sido leído";
                    //         break;
                    //     case 1:
                    //         //
                    //         $text = "Leído una vez";
                    //         break;
                    //     default:
                    //         //
                    //         $text = " $views";
                    //         break;
                    // }
                    ?>
                    | <i class="zmdi zmdi-eye"></i>&nbsp;<?php echo $views ?>
                <?php } ?>
            </p>
        </div>
        <div class="card-reveal">

            <span class="card-title">
              <i class="zmdi zmdi-close zmdi-hc-2x right"></i>
                  <?php if (!empty($post->post_title)) { ?>

                      <a href="<?php the_permalink() ?>"
                         title="<?php echo mythemes_post::title($post->ID, true); ?>"><?php the_title(); ?></a>

                  <?php } else { ?>

                      <!-- if the title is empty show "Read more about .." text -->
                      <a href="<?php the_permalink() ?>"><?php _e('Read more about ..', 'materialize') ?></a>

                  <?php } ?>

            </span>
            <p>
                <?php

                // the content for button read more
                $read_more_link = '<span class="hide-on-small-only right">' . __('Leer Más', 'materialize') . '</span>' .
                    '<span class="hide-on-med-and-up zmdi zmdi-forward zmdi-hc-2x right"></span>';

                the_excerpt();
                echo '<a href="' . get_permalink($post->ID) . '" class="more-link">';
                echo $read_more_link;
                echo '</a>';


                ?>
            </p>
        </div>
    </div>
</div>
