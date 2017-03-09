<?php
if(class_exists( 'mythemes_layout' ) ){
  class mythemes_humanos_layout extends mythemes_layout
  {
    function sidebar( $position )
    {
        $sidebar = $this -> get( 'sidebar', $this -> template );

        if( $this -> layout == $position ){
          $blog_title                     = esc_attr( get_bloginfo( 'name' ) );
          $blog_description               = esc_attr( get_bloginfo( 'description' ) );
          $mythemes_logo_src              = esc_url( get_theme_mod( 'mythemes-blog-logo' , get_template_directory_uri() . '/media/_frontend/img/logo.png' ) );


//             echo '<div id="stick" class="side sidebar widget-area" role="complementary">
// ';
//
            echo ' <aside id="widget-mobile" class=" col m6 l3 mythemes-sidebar sidebar-to-' . esc_attr( $position ) . '">';
            echo '<div class="hide-on-large-only" style="text-align: center;" ><img src="' . esc_url( $mythemes_logo_src ) . '" title="' . esc_attr( $blog_title . ' - ' . $blog_description ) . '"/></div>';
            get_sidebar( esc_attr( $sidebar ) );

            echo '<div class="clear"></div></aside>';

            return;
        }
    }
  }

  // runkit_method_redefine('mythemes_layout', 'sidebar', '$position',
  //
  //     '  $sidebar = $this -> get( \'sidebar\', $this -> template );
  //
  //       if( $this -> layout == $position ){
  //         $blog_title                     = esc_attr( get_bloginfo( \'name\' ) );
  //         $blog_description               = esc_attr( get_bloginfo( \'description\' ) );
  //         $mythemes_logo_src              = esc_url( get_theme_mod( \'mythemes-blog-logo\' , get_template_directory_uri() . \'/media/_frontend/img/logo.png\' ) );
  //
  //           echo \'<aside id="widget-mobile" class=" col m6 l3 mythemes-sidebar sidebar-to-\' . esc_attr( $position ) . \'">\';
  //           echo \'<div class="hide-on-large-only" style="text-align: center;" ><img src="\' . esc_url( $mythemes_logo_src ) . \'" title="\' . esc_attr( $blog_title . \' - \' . $blog_description ) . \'"/></div>\';
  //           get_sidebar( esc_attr( $sidebar ) );
  //
  //           echo \'</aside>\';
  //
  //           return;
  //       }'
  // );



}   /* END IF CLASS EXISTS */
?>
