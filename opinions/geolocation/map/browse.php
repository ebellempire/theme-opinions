<?php
queue_css_file('geolocation-items-map');

$title = __('%s Map', ob_item_label());
echo head(array(
    'title' => $title,
    'bodyclass' => 'map browse',
    'banner'=>array($title,__('%s total', $totalItems))));
?>

<?php echo ob_secondary_nav(); ?>

<?php echo item_search_filters(); ?>
<?php echo pagination_links();?>

<div id="primary-content">
    <div id="geolocation-browse">
        <?php echo $this->geolocationMapBrowse('map_browse', array('list' => 'map-links', 'params' => $params)); ?>
        <div id="map-links">
            <h2><?php echo __('Find An Item on the Map'); ?></h2>
        </div>
    </div>
</div>

<?php echo foot(); ?>