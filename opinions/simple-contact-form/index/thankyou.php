<?php echo head(array('banner'=>array(html_escape(get_option('simple_contact_form_thankyou_page_title')),null,null))); ?>

<!-- Title -->
<div id="page-title">
    <h1><?php echo html_escape(get_option('simple_contact_form_thankyou_page_title')); ?></h1>
</div>
<div id="primary-content">
    <div class="main-text">
        <div id="simple-contact">
        <?php echo get_option('simple_contact_form_thankyou_page_message'); // HTML?>
        </div>
    </div>
    <!-- Side content -->
    <div class="sidebar-content"></div>
</div>
<?php echo foot(); ?>