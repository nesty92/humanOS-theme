<?php
if( !class_exists( 'mythemes_humanos_scripts' ) ){

class mythemes_humanos_scripts
{
    static function frontend()
    {
        $ver        = mythemes_core::theme( 'Version' );

        $font_1     = 'Poiret+One';
        $font_2     = 'Raleway:400,100,200,300,500,600,700,800,900';
        $font_3     = 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300&subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';

        //wp_register_style( 'materialize-google-font-1',           '//fonts.googleapis.com/css?family=' . esc_attr( $font_1 ), null, $ver );
        //wp_register_style( 'materialize-google-font-2',           '//fonts.googleapis.com/css?family=' . esc_attr( $font_2 ), null, $ver );
        //wp_register_style( 'materialize-google-font-3',           '//fonts.googleapis.com/css?family=' . esc_attr( $font_3 ), null, $ver );

        /* COMMON */
        wp_register_style( 'mythemes-icons',                    get_stylesheet_directory_uri() . '/media/css/mythemes-icons.css', null, $ver );
        wp_register_style( 'materialize-icons',                 get_stylesheet_directory_uri() . '/media/css/material-design-iconic-font.min.css', null, $ver );

         wp_register_style( 'font-awesome',                     get_stylesheet_directory_uri() . '/media/css/font-awesome.css', null, $ver );

        /* FRONTEND */
        wp_register_style( 'mythemes-effects',                  get_template_directory_uri() . '/media/_frontend/css/effects.css', null, $ver );
        wp_register_style( 'mythemes-header',                   get_stylesheet_directory_uri() . '/media/_frontend/css/header.css', null, $ver );
        wp_register_style( 'mythemes-materialize',              get_stylesheet_directory_uri() . '/media/_frontend/css/materialize.min.css', null, $ver );
        wp_register_style( 'mythemes-typography',               get_stylesheet_directory_uri() . '/media/_frontend/css/typography.css', null, $ver);
        wp_register_style( 'mythemes-navigation',               get_template_directory_uri() . '/media/_frontend/css/navigation.css', null, $ver );
        wp_register_style( 'mythemes-nav',                      get_stylesheet_directory_uri() . '/media/_frontend/css/nav.css', null, $ver );
        wp_register_style( 'mythemes-blog',                     get_stylesheet_directory_uri() . '/media/_frontend/css/blog.css', null, $ver );
        wp_register_style( 'mythemes-forms',                    get_stylesheet_directory_uri() . '/media/_frontend/css/forms.css', null, $ver );
        wp_register_style( 'mythemes-elements',                 get_stylesheet_directory_uri() . '/media/_frontend/css/elements.css', null, $ver );
        wp_register_style( 'mythemes-widgets',                  get_stylesheet_directory_uri() . '/media/_frontend/css/widgets.css', null, $ver );
        wp_register_style( 'mythemes-comments',                 get_stylesheet_directory_uri() . '/media/_frontend/css/comments.css', null, $ver );
        wp_register_style( 'mythemes-comments-typography',      get_template_directory_uri() . '/media/_frontend/css/comments-typography.css', null, $ver );
        wp_register_style( 'mythemes-footer',                   get_template_directory_uri() . '/media/_frontend/css/footer.css', null, $ver );
        wp_register_style( 'mythemes-pretty-photo',             get_template_directory_uri() . '/media/_frontend/css/prettyPhoto.css', null, $ver );
        wp_register_style( 'mythemes-plugins',                  get_template_directory_uri() . '/media/_frontend/css/plugins.css', null, $ver );

        $dependency = array(
            // 'mythemes-icons',
 'materialize-icons',
            'font-awesome',

            'mythemes-effects',
            'mythemes-header',
            'mythemes-materialize',
            'mythemes-typography',
            'mythemes-navigation',
            'mythemes-nav',
            'mythemes-blog',
            'mythemes-forms',
            'mythemes-elements',
            'mythemes-widgets',
            'mythemes-comments',
            'mythemes-comments-typography',
            'mythemes-footer',
            'mythemes-pretty-photo',
            'mythemes-plugins',
        );

        /**
         *
         */

        $css_files = (array)apply_filters( 'materialize_css_files', array() ); //(array)materialize_cfgs::get( 'css-files' )

        foreach( $css_files as $css_file_index => $css_file_uri ){
            $dependency[] = $css_file_index;
            wp_register_style( $css_file_index, $css_file_uri, null, $ver );
        }

        /* MAIN STYLE */
        wp_enqueue_style( 'mythemes-style',                     get_template_directory_uri() . '/style.css', $dependency );

        // Load the Internet Explorer specific stylesheet.
        wp_enqueue_style( 'materialize-ie',                     get_template_directory_uri() . '/media/_frontend/css/ie.css', null, $ver );
        wp_style_add_data( 'materialize-ie', 'conditional', 'IE' );


        // Load the Internet Explorer 9 specific scripts.
        wp_enqueue_script( 'respond',                           get_template_directory_uri() . '/media/_frontend/js/respond.min.js', null, $ver );
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

        wp_enqueue_script( 'html5shiv',                         get_template_directory_uri() . '/media/_frontend/js/html5shiv.min.js', null, $ver );
        wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

        /* REGISTER SCRIPTS */
        wp_register_script( 'mythemes-materialize',             get_template_directory_uri() . '/media/_frontend/js/materialize.min.js', array( 'jquery' ), $ver, true );
        wp_register_script( 'mythemes-functions',               get_stylesheet_directory_uri() . '/media/_frontend/js/functions.js', array( 'masonry' ) , $ver, true );
        wp_register_script( 'sticky-kit',               get_stylesheet_directory_uri() . '/media/_frontend/js/jquery.sticky-kit.min.js', array( 'masonry' ) , $ver, true );

        wp_register_script( 'mythemes-pretty-photo',            get_template_directory_uri() . '/media/_frontend/js/jquery.prettyPhoto.js', null, $ver, true );
        wp_register_script( 'mythemes-pretty-photo-settings',   get_template_directory_uri() . '/media/_frontend/js/jquery.prettyPhoto.settings.js', null, $ver, true );

        wp_enqueue_script( 'mythemes-functions' );
        wp_enqueue_script( 'sticky-kit' );
        wp_enqueue_script( 'mythemes-materialize' );
        wp_enqueue_script( 'mythemes-pretty-photo' );
        wp_enqueue_script( 'mythemes-pretty-photo-settings' );

        /* INCLUDE FOR REPLY COMMENTS */
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
                wp_enqueue_script( 'comment-reply' );
    }


}

}   /* END IF CLASS EXISTS */
?>
