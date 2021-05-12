<?php
$pageTitle = __('405 Method Not Allowed');
echo head(array('title' => $pageTitle,'banner'=>array($pageTitle,null)));
?>
<!-- Title -->
<div id="page-title">
    <h1><?php echo $pageTitle; ?></h1>
</div>

<div id="primary-content">
    <p><?php echo __('The method used to access this URL (%s) is not valid.', html_escape($this->method)); ?></p>
</div>
<?php echo foot(); ?>