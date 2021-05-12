<?php
$pageTitle = __('%s Search', ob_item_label('singular'));
echo head(array('title' => $pageTitle,'bodyclass' => 'items advanced-search','banner'=>array($pageTitle,__('Advanced Search'),null)));
?>

<?php echo ob_secondary_nav(); ?>

<?php echo ob_sort_links('none');?>

<!-- Title -->
<div id="page-title">
    <h1><?php echo $pageTitle; ?></h1>
</div>
<div id="search-form-container">
    <?php echo $this->partial('items/search-form.php', array('formAttributes' =>array('id' => 'advanced-search-form'))); ?>
</div>

<?php echo foot(); ?>