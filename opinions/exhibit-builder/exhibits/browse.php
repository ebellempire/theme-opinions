<?php
$title = __('All Exhibits');
if ($_GET["tags"]) {
    $title = __('Exhibit Results');
}
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse','banner'=>array($title,__('%s total', $total_results))));
?>

<?php echo ob_secondary_nav('exhibits');?>
<?php echo item_search_filters(); ?>
<?php echo ob_sort_links('exhibits');?>

<!-- Title -->
<div id="page-title">
    <h1><?php echo $title; ?></h1>
</div>
<div id="primary-content">
    <?php
    if (count($exhibits) > 0) {
        foreach (loop('exhibit') as $exhibit) {
            echo ob_exhibit_card($exhibit, get_view());
        }
    } else {
        echo __('There are no exhibits available yet.');
    } ?>
</div>

<?php echo pagination_links(); ?>

<?php echo foot(); ?>