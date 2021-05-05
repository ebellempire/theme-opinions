<?php
$img = $exhibit->getCoverImage();
if ($file = $img) {
    $img_path = $file->getWebPath('fullsize');
} else {
    $img_path = null;
}
echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary',
'banner'=>array(metadata('exhibit', 'title'),__('Summary'),$img_path))); ?>

<div id="exhibit-title">
    <h1><?php echo metadata('exhibit', 'title'); ?></h1>
</div>

<div id="primary-content">
    <div id="main-text">
        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
        <div class="exhibit-description main-text">
            <?php echo $exhibitDescription; ?>
        </div>
        <?php endif; ?>

        <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
        <div class="exhibit-credits element">
            <h3><?php echo __('Credits'); ?></h3>
            <p><?php echo $exhibitCredits; ?></p>
        </div>
        <?php endif; ?>

        <?php
        if ($start = $exhibit->getFirstTopPage()) {
            // add link button to first page
            echo '<a class="button button-primary" href="'.exhibit_builder_exhibit_uri($exhibit, $start).'">'.__('View Exhibit').'<a>';
        }

        ?>
    </div>
    <nav id="exhibit-pages">
        <?php
        if ($pageTree = exhibit_builder_page_tree()) {
            echo '<h4 class="exhibit-summary-link">'.exhibit_builder_link_to_exhibit($exhibit).'</h4>';
            echo exhibit_builder_page_tree($exhibit, $exhibit_page);
        }?>
    </nav>
</div>


<?php echo foot(); ?>