<?php
$pageTitle = __('Site Search');
echo head(array('title' => $pageTitle, 'bodyclass' => 'search','banner'=>array($pageTitle,__('%s result', $total_results))));
$searchRecordTypes = get_search_record_types();
?>

<?php echo search_filters(); ?>

<?php echo ob_secondary_nav('search'); ?>

<?php echo ob_sort_links('search');?>

<div id="primary-content">
    <?php
    if ($total_results) {
        foreach (loop('search_texts') as $searchText) {
            echo ob_search_record_card($searchText);
        }
    } else {
        echo '<div id="no-results"><p>'.__('Your query returned no results.').'</p></div>';
    }?>
</div>

<?php echo foot(); ?>