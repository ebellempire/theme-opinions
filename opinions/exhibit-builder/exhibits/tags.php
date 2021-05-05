<?php
$title = __('Browse Exhibits by Tag');
echo head(array('title' => $title, 'bodyclass' => 'exhibits tags','banner'=>array($title,__('%s total', count($tags)))));
?>

<?php echo ob_secondary_nav('exhibits');?>

<?php echo tag_cloud($tags, 'exhibits/browse'); ?>

<?php echo foot(); ?>