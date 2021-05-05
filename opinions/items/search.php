<?php
$pageTitle = __('%s Search', ob_item_label('singular'));
echo head(array('title' => $pageTitle,'bodyclass' => 'items advanced-search','banner'=>array($pageTitle,null)));
?>

<?php echo ob_secondary_nav(); ?>

<div id="search-form-container">
    <?php echo $this->partial('items/search-form.php', array('formAttributes' =>array('id' => 'advanced-search-form'))); ?>
</div>

<?php echo foot(); ?>