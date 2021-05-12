<?php
$collectionTitle = metadata('collection', 'display_title');
$total = metadata('collection', 'total_items');
$recordimg=record_image('collection', 'fullsize');
if ($recordimg) {
    preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', $recordimg, $result);
    $src=array_pop($result);
} else {
    $src=null;
}

?>

<?php echo head(array('title' => $collectionTitle, 'bodyclass' => 'collections show','collection'=>$collection,'banner'=>array($collectionTitle,$total.' '.ob_item_label('plural'),$src))); ?>

<!-- Title -->
<div id="page-title">
    <h1><?php echo metadata($collection, 'rich_title', array('no_escape' => true)); ?></h1>
</div>

<!-- Primary Content -->
<div id="primary-content">
    <!-- Description -->
    <div class="main-text">
        <?php echo metadata($collection, array('Dublin Core','Description'));?>

    </div>

    <?php echo ob_secondary_nav('collection', $collection->id);?>

    <!-- Items from the collection -->
    <div id="secondary-content">
        <?php
     if ($total > 0) {
         foreach (loop('items') as $item) {
             echo ob_item_card($item, get_view());
         }
     } else {
         echo '<div>'.__("There are currently no items within this collection.").'</div>';
     }
    ?>

    </div>
</div>

<!-- All Metadata -->
<?php echo ob_all_metadata($collection, get_theme_option('collections_full_record'));?>

<?php echo foot(); ?>