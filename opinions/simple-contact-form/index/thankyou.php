<?php echo head(array('banner'=>array(html_escape(get_option('simple_contact_form_thankyou_page_title')),null,null))); ?>
<h1><?php echo html_escape(get_option('simple_contact_form_thankyou_page_title')); ?></h1>
<div id="primary-content">
    <?php echo get_option('simple_contact_form_thankyou_page_message'); // HTML?>
</div>
<?php echo foot(); ?>