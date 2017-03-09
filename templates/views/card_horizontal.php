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

<!-- question content wrapper -->
<div class="col s12 post">
    <div class="card horizontal">

      <?php $num=$post->comment_count;
            $clas="more_cmm";
            $clas_m="more_title";
            if($num==0){
              $clas="cero_cmm";
              $clas_m='cero_title';
            }
      ?>
      <div class="card-image card-question hide-on-small-only <?php echo $clas;?> valign-wrapper">
        <span class="comment_number"><?php echo $num; ?></span>
      </div>
        <div class="card-stacked">
            <div class="card-content  <?php echo $clas_m;?>">
                <?php if (!empty($post->post_title)) { ?>

                    <a class="title" href="<?php the_permalink() ?>"
                       title="<?php echo mythemes_post::title($post->ID, true); ?>"><?php the_title(); ?></a>

                <?php } else { ?>

                    <!-- if the title is empty show "Read more about .." text -->
                    <a href="<?php the_permalink() ?>"><?php _e('Read more about ..', 'materialize') ?></a>

                <?php } ?>
                <p class="">
                    <i class="zmdi zmdi-account-circle "></i> Por: <a
                        href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"
                        class="fn"><?php echo wp_trim_words(get_the_author(), 1, ''); ?></a>
                    <time class="updated" data-toggle="tooltip" datetime="<?php echo get_the_time('c'); ?>"
                          title="<?php echo get_the_date(); ?>">
                        | <i
                            class="zmdi zmdi-calendar "></i> <?php echo shoestrap_human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
                    </time>

                    | <i class="zmdi zmdi-comments "></i>  <a
                            href="<?php echo get_comments_link() ?>"
                            title="<?php echo esc_attr(sprintf(__('Comment on %s'), get_the_Title())) ?>"
                            rel="tooltip"><?php comments_number('0', '1', '%'); ?></a>
                    <?php if (function_exists('the_views')) { ?>
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
            <div class="card-action">

                <?php

                // the content for button read more
                $read_more_link = '<span class="hide-on-med-and-down right">' . __('Leer más', 'materialize') . '</span>' .
                    '<span class="hide-on-small-only hide-on-large-only zmdi zmdi-forward zmdi-hc-2x right"></span>';

                the_excerpt();
                echo '<a href="' . get_permalink($post->ID) . '" class="more-link">';
                echo $read_more_link;
                echo '</a>';


                ?>


            </div>
        </div>

    </div>
</div>
