<?php
$fileTitle = metadata('file', 'display_title');
if (substr($fileTitle, 0, 4) === "http") {
    $fileTitle = '['.__('Untitled').']';
}
$imgTag=record_image($file, 'fullsize');
preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', $imgTag, $result);
$src=array_pop($result);
?>
<?php echo head(array('title' => $fileTitle, 'bodyclass' => 'files show primary-secondary','file'=>$file, 'banner'=>array($fileTitle,__('From %s record', ob_item_label()).': '.link_to_item(null, array(), 'show', $file->getItem()),$src))); ?>

<!-- Title -->
<div id="file-title">
    <h1><?php echo $fileTitle;?></h1>
    <p><?php echo '<span id="appears-in"><span>'
        .__('This file originally appears in %s record', ob_item_label()).
        ': </span>'.link_to_item(null, array(), 'show', $file->getItem())
        .'</span>';?> </p>
</div>

<!-- Primary Content -->
<div id="primary-content">

    <?php echo file_markup($file, array('imageSize' => 'fullsize')); ?>
    <div class="main-text">
        <?php echo '<div id="file-description">'.ob_dublin($file, 'Description').'</div>';?>
    </div>


</div>

<!-- All Metadata -->
<div id="full-metadata-record">
    <div class="meta-container-inner">
        <!-- Dublin Core -->
        <?php echo all_element_texts('file', array('show_element_set_headings'=>false)); ?>
        <!-- Format -->
        <div id="format-metadata">
            <div id="original-filename" class="element">
                <h3><?php echo __('Original Filename'); ?></h3>
                <div class="element-text"><?php echo metadata('file', 'Original Filename'); ?></div>
            </div>

            <div id="file-size" class="element">
                <h3><?php echo __('File Size'); ?></h3>
                <div class="element-text"><?php echo __('%s bytes', metadata('file', 'Size')); ?></div>
            </div>

            <div id="authentication" class="element">
                <h3><?php echo __('Authentication'); ?></h3>
                <div class="element-text"><?php echo metadata('file', 'Authentication'); ?></div>
            </div>
        </div>
        <!-- Type -->
        <div id="type-metadata">
            <div id="mime-type-browser" class="element">
                <h3><?php echo __('Mime Type'); ?></h3>
                <div class="element-text"><?php echo metadata('file', 'MIME Type'); ?></div>
            </div>
            <div id="file-type-os" class="element">
                <h3><?php echo __('File Type / OS'); ?></h3>
                <div class="element-text"><?php echo metadata('file', 'Type OS'); ?></div>
            </div>
        </div>
    </div>
</div>

<?php echo foot();?>