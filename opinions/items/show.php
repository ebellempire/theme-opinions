<?php
$title = metadata('item', 'display_title');
echo head(array('title' => $title, 'bodyclass' => 'items show','item'=>$item,'banner'=>array(metadata($item, 'rich_title', array('no_escape' => true)),ob_byline($item),opinions_record_image_src($item))));
?>

<!-- Title -->
<div id="item-title">
    <h1><?php echo metadata($item, 'rich_title', array('no_escape' => true)); ?></h1>
</div>

<!-- Primary Content -->
<div id="primary-content">
    <!-- Description -->
    <div class="main-text">
        <?php echo ob_item_description($item);?>
    </div>
    <div class="columns two">
        <div class="column">
            <!-- Files -->
            <?php echo ob_item_files($item, true);?>
        </div>
        <div class="column">
            <!-- Item Collection -->
            <?php echo ob_item_collection($item);?>
            <!-- Tags -->
            <?php echo ob_tags($item);?>
            <!-- Citation -->
            <?php echo ob_citation($item);?>
        </div>
    </div>

</div>
<div id="secondary-content">
    <!-- All Metadata -->
    <?php echo ob_all_metadata($item, get_theme_option('items_full_record'));?>
</div>

<div id="plugin-content">
    <!-- Plugins -->
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
</div>

<!-- Pagination -->
<?php echo ob_item_pagination($item);?>

<!-- req. markup for image viewer -->
<?php echo ob_photoswipe_markup($item);?>

<?php echo foot(); ?>