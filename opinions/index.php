<?php echo head(array('bodyid' => 'home')); ?>

<!-- Homepage Text Block 1 -->
<?php echo ob_homepage_text_block_1();?>
<!--  Featured Item -->
<?php echo ob_featured_item_block();?>
<!--  Featured Collection -->
<?php echo ob_featured_collection_block();?>
<!-- Recent Items -->
<?php echo ob_recent_items_block();?>
<!-- Homepage Text Block 2 -->
<?php echo ob_homepage_text_block_2();?>
<!-- Plugin Hooks -->
<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>