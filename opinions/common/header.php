<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">

<head>
    <meta charset="utf-8">
    <?php if ($author = option('author')): ?>
    <meta name="author" content="<?php echo $author; ?>" />
    <?php endif; ?>
    <?php if ($copyright = option('copyright')): ?>
    <meta name="copyright" content="<?php echo $copyright; ?>" />
    <?php endif; ?>
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting(trim($title));
    }
    $titleParts[] = trim(option('site_title'));
    if (!isset($title) && get_theme_option('site_subheading')) {
        $titleParts[] = trim(
            get_theme_option('site_subheading')
        );
    }
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <?php
    $item = (isset($item)) ? $item : null;
    $file = (isset($file)) ? $file : null;
    $collection = (isset($collection)) ? $collection : null;
    ?>

    <!-- FB Open Graph stuff: see also robots.txt -->
    <meta property="og:title" content="<?php echo trim(implode(' | ', $titleParts)); ?>" />
    <meta property="og:image" content="<?php echo ob_seo_pageimg($item, $file, $collection);?>" />
    <meta property="og:site_name" content="<?php echo trim(option('site_title'));?>" />
    <meta property="og:description" content="<?php echo ob_seo_pagedesc($item, $file, $collection);?>" />

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=5,viewport-fit=cover">


    <!-- Twitter Card stuff: see also robots.txt -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo trim(implode(' | ', $titleParts)); ?>">
    <meta name="twitter:description" content="<?php echo ob_seo_pagedesc($item, $file, $collection);?>">
    <meta name="twitter:image" content="<?php echo ob_seo_pageimg($item, $file, $collection);?>">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo img('apple-touch-icon.png', 'images/favicon');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo img('favicon-32x32.png', 'images/favicon');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo img('favicon-16x16.png', 'images/favicon');?>">

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>

    <!-- Load fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital@0;1&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital@0;1&display=swap" media="print" onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital@0;1&display=swap" />
    </noscript>
    <!-- Stylesheets -->
    <?php
    queue_css_file('normalize');
    queue_css_file('default');
    queue_css_file('custom');
    queue_css_file('mmenu', 'all', false, 'javascripts/mmenu');
    if ($item && metadata($item, 'has thumbnail')) {
        queue_css_file('photoswipe', 'all', false, 'javascripts/photoswipe');
        queue_css_file('default-skin', 'all', false, 'javascripts/photoswipe/default-skin');
    }
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <script>
    window.typetura = {
        selectors: [
            "#site-title h1",
            "#site-title h2",
            ".headline",
        ]
    }
    </script>
    <?php
    queue_js_file('typetura.min', 'javascripts/typetura');
    queue_js_file('mmenu', 'javascripts/mmenu');
    queue_js_file('globals');
    if ($item && metadata($item, 'has thumbnail')) {
        queue_js_file('photoswipe.min', 'javascripts/photoswipe');
        queue_js_file('photoswipe-ui-default.min', 'javascripts/photoswipe');
        queue_js_file('item');
    }
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<a href="#banner-title" id="skipnav"><?php echo __('Skip to main content'); ?></a>
<?php fire_plugin_hook('public_body', array('view' => $this)); ?>
<div id="wrap">

    <header role="banner">
        <div id="site-title-logo">
            <?php echo opinions_site_title();?>
            <div class="menu-icons">
                <a href="/items/search" id="search-button" style="fill:white"><?php echo ob_svg_search_icon();?></a>
                <a href="javascript:void(0)" id="menu-button" style="fill:white"><?php echo ob_svg_hamburger_icon();?></a>
            </div>
        </div>
        <!-- Header Nav -->
        <?php echo opinions_nav_container(get_theme_option('add_home'));?>
        <?php echo ob_search_container();?>
        <div id="banner-container" class="<?php echo (opinions_banner_image(@$banner)) ? 'image' : 'no-image';?> <?php echo (get_theme_option('fun_banner') && @$banner[2] !== null) ? 'fun' : 'no-fun';?> <?php echo (get_theme_option('logo')) ? 'has-logo' : 'no-logo';?>" style="background-image:linear-gradient(rgba(0,0,0,0),rgba(0,0,0,0),rgba(0,0,0,0),rgba(0,0,0,.25),rgba(0,0,0,1)),url(<?php echo opinions_banner_image(@$banner);?>),linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.75)),url(<?php echo opinions_banner_image(@$banner);?>">
            <div id="banner-title" class="<?php echo (opinions_banner_image(@$banner)) ? 'image' : 'no-image';?>">
                <div class="shade">
                    <?php echo opinions_banner_text(@$banner);?></div>
            </div>
        </div>
        <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
    </header>

    <article id="content" role="main">
        <div id="wrap-inner">
            <?php fire_plugin_hook('public_content_top', array('view' => $this)); ?>