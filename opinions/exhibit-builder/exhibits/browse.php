<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse','banner'=>array($title,__('%s total', $total_results))));
?>

<?php echo ob_secondary_nav('exhibits');?>

<?php echo ob_sort_links('exhibits');?>

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