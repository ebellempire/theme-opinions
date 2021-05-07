<?php
$pageTitle = __('%s Tags', ob_item_label());
echo head(array('title' => $pageTitle, 'bodyclass' => 'items tags','banner'=>array($pageTitle,__('%s total', count($tags)))));
?>

<?php echo ob_secondary_nav(); ?>

<?php echo ob_sort_links('tags');?>

<!-- Title -->
<div id="item-title">
    <h1><?php echo $pageTitle; ?></h1>
</div>
<div id="primary-content">
    <?php
    if (get_theme_option('tag_images')==1) {
        echo '<div id="tag-image-gallery">';
        foreach ($tags as $tag) {
            echo ob_tag_image($tag->name);
        }
        echo '</div>';
    } else {
        echo tag_cloud($tags, 'items/browse');
    }
    ?>
</div>

<?php echo foot(); ?>