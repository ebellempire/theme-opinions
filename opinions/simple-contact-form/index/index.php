<?php echo head(array('bodyclass'=>'simple-contact-form','banner'=>array(html_escape(get_option('simple_contact_form_contact_page_title')),null,null))); ?>

<!-- Title -->
<div id="page-title">
    <h1><?php echo html_escape(get_option('simple_contact_form_contact_page_title')); ?></h1>
</div>
<div id="primary-content">
    <div class="main-text">
        <div id="simple-contact">
            <div id="form-instructions">
                <?php echo get_option('simple_contact_form_contact_page_instructions'); // HTML?>
            </div>
            <?php echo flash(); ?>
            <form name="contact_form" id="contact-form" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="field">
                    <?php echo $this->formLabel('name', 'Your Name: '); ?>
                    <div class='inputs'>
                        <?php echo $this->formText('name', $name, array('class'=>'textinput')); ?>
                    </div>
                </div>
                <div class="field">
                    <?php echo $this->formLabel('email', 'Your Email: '); ?>
                    <div class='inputs'>
                        <?php echo $this->formText('email', $email, array('class'=>'textinput'));  ?>
                    </div>
                </div>
                <div class="field">
                    <?php echo $this->formLabel('message', 'Your Message: '); ?>
                    <div class='inputs'>
                        <?php echo $this->formTextarea('message', $message, array('class'=>'textinput', 'rows' => '10')); ?>
                    </div>
                </div>
                <?php if ($captcha): ?>
                <div class="field">
                    <?php echo $captcha; ?>
                </div>
                <?php endif; ?>
                <div class="field">
                    <?php echo $this->formSubmit('send', 'Send Message', array('class'=>'button button-primary')); ?>
                </div>
            </form>
        </div>
    </div>
    <!-- Side content -->
   <div class="sidebar-content"></div>
</div>

<?php echo foot();
