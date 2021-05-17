<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug'),
    'banner' => array(metadata('simple_pages_page', 'title'),null)
));
?>
<!-- Title -->
<div id="page-title">
    <h1><?php echo metadata('simple_pages_page', 'title');?></h1>
</div>
<div id="primary-content">
    <div class="main-text">
        <?php
        $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
        echo $this->shortcodes($text);
        ?>
    </div>
    <!-- Side content -->
    <div class="sidebar-content"></div>
</div>

<?php echo foot(); ?>