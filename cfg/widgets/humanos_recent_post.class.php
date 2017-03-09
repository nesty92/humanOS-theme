<?php
/*
HumanOS_Recent_Posts_Widget
*/
class HumanOS_Recent_Posts_Widget extends WP_Widget {

  function __construct() {
    $widget_ops = array('classname' => 'humanos_recent_entries2', 'description' => __( "The most recent posts on your site"));
    parent::__construct('humanos_recent_entries', 'HumanOS: '.__('Recent Posts'), $widget_ops);
    $this->alt_option_name = 'humanos_recent_entries';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('humanos_recent_posts_widget', 'widget');

    if ( !is_array($cache) )
      $cache = array();

    if ( ! isset( $args['widget_id'] ) )
      $args['widget_id'] = $this->id;

    if ( isset( $cache[ $args['widget_id'] ] ) ) {
      echo $cache[ $args['widget_id'] ];
      return;
    }

    ob_start();
    extract($args);

    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
    $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
    $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
    if ( ! $number )
      $number = 10;
    $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
    $show_excerpt = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : false;
    $show_comments = isset( $instance['show_comments'] ) ? $instance['show_comments'] : false;
    $post_type = isset( $instance['post_type'] ) ? $instance['post_type'] : 'post';

    $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'post_type' => $post_type ) ) );
    if ($r->have_posts()) :
?>
    <?php echo $before_widget; ?>
    <?php if ( $title ) echo $before_title . $title . $after_title; ?>
    <ul class="nav nav-list" data-post-type="<?php echo strtoupper($post_type) ?>">
    <?php while ( $r->have_posts() ) : $r->the_post(); ?>
      <li>
        <div class="row horizontal">
          <?php if ($show_comments) : ?>
            <?php $comments = get_comments_number() ?>
          <div class="col card-image <?php echo ($comments > 0) ? 'more_cmm' : 'cero_cmm' ?> valign-wrapper">
                  <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>">


                    <h3><?php echo $comments ?></h3>

          </div>
          <?php endif; ?>
          <div class="col card-stacked">
                <?php if ( get_the_title() ) the_title(); else the_ID(); ?>
                <?php if ( $show_date ) : ?>
                  | <i class="time-icon icon-calendar"></i>
                  <time class="updated" datetime="<?php echo get_the_time( 'c' ); ?>" pubdate><?php echo get_the_date(); ?></time>
                <?php endif; ?>
                  </a>
                  <?php if ( $show_excerpt ) : ?>
                    <p class="post-excerpt muted"><?php echo $this->limit_words(get_the_excerpt()); ?></p>
                  <?php endif; ?>
          </div>
        </div>
      </li>
    <?php endwhile; ?>
    </ul>
    <?php echo $after_widget; ?>
<?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    endif;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('humanos_recent_posts_widget', $cache, 'widget');
  }

  private function limit_words($string, $word_limit = 10) {

  // creates an array of words from $string (this will be our excerpt)
  // explode divides the excerpt up by using a space character
  $words = explode(' ', $string);

  // this next bit chops the $words array and sticks it back together
  // starting at the first word '0' and ending at the $word_limit
  // the $word_limit which is passed in the function will be the number
  // of words we want to use
  // implode glues the chopped up array back together using a space character
  $text = implode(' ', array_slice($words, 0, $word_limit));

  return ($string != $text) ? $text.'&hellip;' : $text;
}

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = (int) $new_instance['number'];
    $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
    $instance['show_excerpt'] = isset( $new_instance['show_excerpt'] ) ? (bool) $new_instance['show_excerpt'] : false;
    $instance['show_comments'] = isset( $new_instance['show_comments'] ) ? (bool) $new_instance['show_comments'] : false;
    $instance['post_type'] = isset( $new_instance['post_type'] ) ? $new_instance['post_type'] : 'post';

    $this->flush_widget_cache();

    $alloptions = wp_cache_get( 'alloptions', 'options' );
    if ( isset($alloptions['humanos_recent_entries']) )
      delete_option('humanos_recent_entries');

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('humanos_recent_posts_widget', 'widget');
  }

  function form( $instance ) {
    $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
    $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
    $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
    $show_excerpt = isset( $instance['show_excerpt'] ) ? (bool) $instance['show_excerpt'] : false;
    $show_comments = isset( $instance['show_comments'] ) ? (bool) $instance['show_comments'] : false;
    $post_type = isset( $instance['post_type'] ) ? $instance['post_type'] : 'post';
?>
    <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
    <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

    <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date ?' ); ?></label></p>

    <p><input class="checkbox" type="checkbox" <?php checked( $show_excerpt ); ?> id="<?php echo $this->get_field_id( 'show_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'show_excerpt' ); ?>"><?php _e( 'Display post excerpt ?' ); ?></label></p>

    <p><input class="checkbox" type="checkbox" <?php checked( $show_comments ); ?> id="<?php echo $this->get_field_id( 'show_comments' ); ?>" name="<?php echo $this->get_field_name( 'show_comments' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'show_comments' ); ?>"><?php _e( 'Display post comments ?' ); ?></label></p>

    <p>
      <label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e('Posts type:'); ?></label>
      <select id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>">
    <?php

      $tmp_post_type = get_post_types();
      $unset_post_type = array('revision' => 'revision', 'page' => 'page', 'attachment' => 'attachment', 'nav_menu_item' => 'nav_menu_item');
      $tmp_post_type = array_diff($tmp_post_type, $unset_post_type);

      foreach ( $tmp_post_type as $type ) {
        echo '<option value="' . $type . '"'
          . selected( $type, $post_type, false )
          . '>'. $type . '</option>';
      }
    ?>
      </select>
    </p>
<?php
  }
}
register_widget( 'humanos_recent_posts_widget' );
