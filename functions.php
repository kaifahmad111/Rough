<?php 
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'shops_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function shops_setup() {
        /*
         * Make theme available for translation.
         */
        load_theme_textdomain( 'shops', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * WooCommerce Support
         */     
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        /*
         * Gutenberg Support
         */         
        add_theme_support( 'align-wide' );
        add_theme_support( 'disable-custom-font-sizes');
        add_theme_support( 'disable-custom-colors' );
        add_theme_support( 'wp-block-styles' );     
        add_theme_support( 'responsive-embeds' );
        // This theme uses wp_nav_menu() in one location.
        add_theme_support( 'nav-menus' );
        register_nav_menu('primary', esc_html__( 'Primary', 'shops' ) );
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'shops_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 55,
            'width'       => 200,
            'flex-width'  => true,
            'flex-height' => false,
        ) );
        
        register_default_headers( array(
            'img1' => array(
                'url'           => get_template_directory_uri() . '/images/header.png',
                'thumbnail_url' => get_template_directory_uri() . '/images/header.png',
                'description'   => esc_html__( 'Default Image 1', 'shops' )
            )

        ));     
    }
endif;

add_action( 'after_setup_theme', 'shops_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function shops_content_width() {
    // This variable is intended to be overruled from themes.
    $GLOBALS['content_width'] = apply_filters( 'shops_content_width', 640 );
}
add_action( 'after_setup_theme', 'shops_content_width', 0 );

/**
 * Register widget area.
 */
function shops_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'shops' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'shops' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'shops' ),
        'id'            => 'footer-1',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'shops' ),
        'id'            => 'footer-2',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'shops' ),
        'id'            => 'footer-3',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'shops' ),
        'id'            => 'footer-4',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'shops_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shops_scripts() {  
    wp_enqueue_script( 'jquery');   
    wp_enqueue_script( 'jquery-ui-accordion' );
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-ui-tabs' );
    wp_enqueue_style( 'shops-style-css', get_stylesheet_uri() );
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'shops-anima-css', get_template_directory_uri() . '/css/anime.css');
    wp_enqueue_style( 'shops-colors-font', '//fonts.googleapis.com/css?family=Do+Hyeon:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' );
    wp_enqueue_style( 'shops-animate-css', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( 'shops-woo-css', get_template_directory_uri() . '/woocommerce/woo-css.css' );
    wp_enqueue_style( 'shops-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0'  );
    wp_enqueue_script( 'shops-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
    wp_enqueue_script( 'shops-mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', array(), '', false );
    wp_enqueue_script( 'shops-top', get_template_directory_uri() . '/js/to-top.js', array(), '', true );
    wp_enqueue_script( 'shops-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'shops_scripts' );


/**
 * Includes
 */


require_once get_template_directory() . '/include/content-customizer.php';
require_once get_template_directory() . '/include/custom-header.php';
require_once get_template_directory() . '/include/template-tags.php';
require_once get_template_directory() . '/include/customizer.php';
require_once get_template_directory() . '/include/header-top.php';
require_once get_template_directory() . '/include/back-to-top-button.php';
require_once get_template_directory() . '/include/read-more-button.php';
require_once get_template_directory() . '/include/before-header.php';
require_once get_template_directory() . '/include/anime.php';
require_once get_template_directory() . '/include/customize-pro/class-customize.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require_once get_template_directory() . '/include/jetpack.php';
}

/**
 * Adds custom classes to the array of body classes.
 */

function shops_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'shops_body_classes' );


function shops_sidebar_position() {
    if ( ( is_active_sidebar('sidebar-1') ) ) { 
        wp_enqueue_style( 'shops-sidebar', get_template_directory_uri() . '/layouts/left-sidebar.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'shops_sidebar_position' );
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function shops_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'shops_pingback_header' );





// my code

/**
 * Add Custom Donation Form Fields
 *
 * @param $form_id
 */
function give_myprefix_custom_form_fieldss( $form_id ) {
    // Only display for forms with the IDs "754" and "578";
    // Remove "If" statement to display on all forms
    // For a single form, use this instead:
    ?>
    <style>
    <?php
    require_once( ABSPATH . '/wp-content/themes/shops/custom/custom.css' );
    ?>
    </style>
    
    <script>
    <?php
    //require_once( ABSPATH . '/wp-content/themes/shops/custom/custom.js' );
    ?>
    </script>
    <?php
    
    
    
    //echo do_shortcode( '[give_multi_form_goal]' );
    
    if ( $form_id == 3716) {
        
    //$forms = array( 712 ); 
    ?>
    <script src=""></script>
    <script>

        document.getElementsByClass('.give-btn')[0].setAttribute("onclick", "sendOTP()");
    </script>
      <div class="tab">
          <span class="step1"><a href="#">PERSONAL INFORMATION</a></span>
          <span class="step2"><a href="#">CAMPAIGN INFORMATION</a></span>
          <span class="step4"><a href="#">VERIFICATIONSSSS</a></span>
      </div>
    <?php
    }
    // endif;
    
    
}
add_action( 'give_before_donation_levels', 'give_myprefix_custom_form_fieldss', 10, 1 );




/**
 * Add Custom Donation Form Fields
 *
 * @param $form_id
 */
function give_myprefix_fundraser_form_fields( $form_id ) {
    // Only display for forms with the IDs "754" and "578";
    // Remove "If" statement to display on all forms
    // For a single form, use this instead:
  if ( $form_id == 3716) {
    $forms = array( 3716, 578 ); ?>
    <script>
    <?php
    require_once( ABSPATH . '/wp-content/themes/shops/custom/verification.js' );
    require_once( ABSPATH . '/wp-content/themes/shops/custom/jquery-3.2.1.min.js' );
    ?>
    </script>
    <?php
    require_once( ABSPATH . '/wp-content/themes/shops/custom/controller.php' );
    ?>
    <div class="tab stepthred">
          <span class="step1"><a href="#">PERSONAL INFORMATION</a></span>
          <span class="step2"><a href="#">CAMPAIGN INFORMATION</a></span>
          <span class="step4"><a href="#">VERIFICATION</a></span>
    </div>
        
    <?php 
    echo do_shortcode( '[give_multi_form_goal]' );
    ?>
    <style>
            body {
            font-size: 0.9em;
            color: #212121;
            font-family: Arial;
        }
        .container {
            width: 350px;
            margin: 50px auto;
            box-sizing: border-box;
        }

        #frm-mobile-verification {
            border: #E0E0E0 1px solid;
            border-radius: 3px;
            padding: 30px;
            text-align: center;
            width
        }

        .form-heading {
            font-size: 1.5em;
            margin-bottom : 30px;
        }

        .form-row {
            margin-bottom: 30px;
        }

        .form-input {
            padding: 10px 20px;
            width: 100%;
            box-sizing: border-box;
            border-radius: 3px;
            border: #E0E0E0 1px solid;
        }

        .btnSubmit {
            background: #4cb7ff;
            padding: 8px 20px;
            border: #47abef 1px solid;
            border-radius: 3px;
            width: 100%;
            color: #FFF;
        }


        .error {
            color: #483333;
            padding: 10px;
            background: #ffbcbc;
            border: #efb0b0 1px solid;
            border-radius: 3px;
            margin: 0 auto;
            margin-bottom: 20px;
            width: 290px;
            display:none;
            box-sizing: border-box;
            visibility: inherit;
        }
        .errorEm {
            color: #483333;
            padding: 10px;
            background: #ffbcbc;
            border: #efb0b0 1px solid;
            border-radius: 3px;
            margin: 0 auto;
            margin-bottom: 20px;
            margin-top: 20px;
            width: 290px;
            display:none;
            box-sizing: border-box;
        }

        .success {
            color: #483333;
            padding: 10px 20px;
            background: #cff9b5;
            border: #bce4a3 1px solid;
            border-radius: 3px;
            margin: 0 auto;
            margin-bottom: 20px;
            width: 290px;
            display:none;
            box-sizing: border-box;
            visibility: inherit;
        }

        .successEm {
            color: #483333;
            padding: 10px 20px;
            background: #cff9b5;
            border: #bce4a3 1px solid;
            border-radius: 3px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            width: 290px;
            display:none;
            box-sizing: border-box;
        }

        .btnVerify {
            background: #4CAF50;
            padding: 8px 20px;
            border: #449e48 1px solid;
            border-radius: 3px;
            width: 100%;
            color: #FFF;
        }
    </style>
<form id="frm-mobile-verification">
<div class="error"></div>
<div class="success"></div>
    <div class="form-row">
        <label>OTP is sent to Your Mobile Number</label>        
    </div>
    <div class="form-row">
        <input type="text"  id="mobileOtp" class="form-input" placeholder="Enter the MOBILE OTP">       
    </div>
    <div class="row">
        <input id="verify" type="button" class="btnVerify" value="Verify mobile no." onClick="verifyOTP();">        
    </div>
    <div class="errorEm"></div>
    <div class="successEm"></div>
    <div class="form-row">
        <label>OTP is sent to Your Email ID</label>     
    </div>
    <div class="form-row">
        <input type="text"  id="emailOtp" class="form-input" placeholder="Enter the EMAIL OTP">     
    </div>
    <div class="row">
        <input id="verify" type="button" class="btnVerify" value="Verify Email Id" onClick="verifyOTP1();">     
    </div>
</form>
    <?php
    // endif;
  }
}

add_action( 'give_payment_mode_bottom', 'give_myprefix_fundraser_form_fields', 10, 1 );
