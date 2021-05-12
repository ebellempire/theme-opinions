<?php
$title = __('Exhibit Tags');
echo head(array('title' => $title, 'bodyclass' => 'exhibits tags','banner'=>array($title,__('%s total', count($tags)))));
?>

<?php echo ob_secondary_nav('exhibits');?>

<?php echo ob_sort_links('exhibit-tags');?>

<!-- Title -->
<div id="page-title">
    <h1><?php echo $title; ?></h1>
</div>
<div id="primary-content">
    <?php echo tag_cloud($tags, 'exhibits/browse'); ?>
</div>
<?php echo foot(); ?>