<?php
$pageTitle = __('All Collections');
$filters = item_search_filters();
if ($filters) {
    $pageTitle = __('Collection Results', ob_item_label());
}
echo head(array('title' => $pageTitle, 'bodyclass' => 'collections browse', 'banner'=>array($pageTitle,__('%s total', $total_results),null,$filters)));
?>

<?php echo ob_secondary_nav('collections'); ?>

<?php echo ob_sort_links('collections');?>

<!-- Title -->
<div id="page-title">
    <h1><?php echo $pageTitle ?></h1>
</div>

<div id="primary-content">
    <?php
     if ($total_results) {
         foreach (loop('collections') as $collection) {
             echo ob_collection_card($collection, get_view());
         }
     } else {
         echo __('There are no Collections matching your request.');
     }
    ?>
</div>

<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_collections_browse', array('collections' => $collections, 'view' => $this)); ?>

<?php echo foot(); ?>