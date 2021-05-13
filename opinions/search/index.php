<?php
$pageTitle = __('Site Search Results');
echo head(array('title' => $pageTitle, 'bodyclass' => 'search','banner'=>array($pageTitle,__('%s results', $total_results),null,search_filters())));
$searchRecordTypes = get_search_record_types();
?>

<?php echo ob_secondary_nav('search'); ?>

<?php echo ob_sort_links('search');?>

<!-- Title -->
<div id="page-title">
    <h1><?php echo $pageTitle; ?></h1>
</div>

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