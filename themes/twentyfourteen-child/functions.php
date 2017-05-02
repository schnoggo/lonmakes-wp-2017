<?php
/**
 * Functions file for twentyfourteen child theme
 * @package lonk2014child
 */
 
/**
 * Google Tag Manager container ID
 */
define("GTM_CONTAINER_ID", "GTM-MJDVT5P");


//
// CSS
// ---

/**
 * DocBlock for function foo?
 *
 * No, this will be for the constant aklo!
 */
function lonk_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'lonk_enqueue_styles' );

//
// Trackers
// --------

function lonk_trackers(){
echo '<meta name="google-site-verification" content="EBI-JylWqUvsr8GK2kDWTnOSFwU2RNh_9-Dem-YsAUI" />';
echo "\n";

}
add_action('wp_head', 'lonk_trackers', 12); // 12 = hook it late


/**
 * Echo out Google Tag Manager code for head section
 */
function lonk_gtm_head(){
echo "
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','" . GTM_CONTAINER_ID . "');</script>
<!-- End Google Tag Manager -->
";
}
add_action('wp_head', 'lonk_gtm_head', 1);  // 1 = hook it first!


/**
 * Echo out Google Tag Manager code for body section
 */
function lonk_gtm_body(){
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo GTM_CONTAINER_ID; ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
}
add_action('body_start', 'lonk_gtm_body', 1); // 1 = hook it first!


//
// favicons
// --------

/**
 * Echo out favicon links for head section
 */
function lonk_favicons(){
  $icon_path = get_stylesheet_directory_uri();
  $type2file = array(
    'favicon' => 'icon',
    'ms' => 'icon',
    'android' => 'icon',
    'apple' => 'apple-touch-icon'
  );
  echo "\n"; // start the block  
  foreach (
    array(   
    'favicon-16x16.png','',
    'favicon-32x32.png','',
    'favicon-96x96.png','',
  //  'ms-icon-70x70.png','',
  //  'ms-icon-144x144.png','',
  //  'ms-icon-150x150.png','',
  //  'ms-icon-310x310.png','',
    'android-icon-36x36.png','',
    'android-icon-48x48.png','',
    'android-icon-72x72.png','',
    'android-icon-96x96.png','',
    'android-icon-144x144.png','',
    'android-icon-192x192.png','',
    'apple-icon-57x57.png','',
    'apple-icon-60x60.png','',
    'apple-icon-72x72.png','',
    'apple-icon-76x76.png','',
    'apple-icon-114x114.png','',
    'apple-icon-120x120.png','',
    'apple-icon-144x144.png','',
    'apple-icon-152x152.png','',
    'apple-icon-180x180.png',
  ) as $icon_file ) {
    $types=split('-', $icon_file);
    $dimensions = preg_replace('/^.*?\-(\d+x\d+)\....$/', '$1', $icon_file);
    if ( isset($types[0]) ){
      echo 
         '<link rel="'
        . $type2file[$types[0]]
        . '" sizes="'
        . $dimensions
        . '" href="'
        . $icon_path . '/favicons/' . $icon_file
        . '" />'
        ."\n";
    }
  }

}
add_action('wp_head', 'lonk_favicons', 10);  // Normal priority

/*

<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
*/
