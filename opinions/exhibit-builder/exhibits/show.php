<?php
$img = $exhibit->getCoverImage();
if ($file = $img) {
    $img_path = $file->getWebPath('fullsize');
} else {
    $img_path = null;
}
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show',
    'banner'=>array(metadata('exhibit', 'title'),metadata('exhibit_page', 'title'),$img_path)));
?>

<div id="page-title">
    <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>
</div>

<div id="primary-content">
    <div id="exhibit-blocks">
        <?php exhibit_builder_render_exhibit_page(); ?>
    </div>
    <nav id="exhibit-pages" style="background-image:url(<?php echo $img_path;?>)">
        <?php
        // Put the (linked) summary page in the nav list
        if ($exhibit->use_summary_page) {
            echo '<div class="inner">';
            echo '<h3 class="exhibit-summary-link">'.exhibit_builder_link_to_exhibit($exhibit, __('Exhibit Summary')).'</h3>';
            echo exhibit_builder_page_tree($exhibit, $exhibit_page);
            echo '</div>';
        } else {
            echo exhibit_builder_page_tree($exhibit, $exhibit_page);
        }?>
    </nav>
</div>
<div id="exhibit-page-navigation">
    <div id="exhibit-nav-prev">
        <?php
        if ($prevLink = exhibit_builder_link_to_previous_page(__('Previous'), array('class'=>'button'))) {
            echo $prevLink;
        } elseif ($exhibit->use_summary_page) {
            // summary page should be part of nav history
            echo exhibit_builder_link_to_exhibit($exhibit, __('Previous'), array('class'=>'button'));
        } ?>
    </div>
    <div id="exhibit-nav-next">
        <?php
        if ($nextLink = exhibit_builder_link_to_next_page(__('Next'), array('class'=>'button'))) {
            echo $nextLink;
        } ?>
    </div>
</div>

<?php echo foot(); ?>