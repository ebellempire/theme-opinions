<?php echo head(); ?>

<!-- Title -->
<div id="page-title">
    <h1><?php echo __("Thank you for contributing!"); ?></h1>
</div>

<div id="primary-content">
    <p><?php echo __("Your contribution will show up in the archive once an administrator approves it. Meanwhile, feel free to %s or %s .", contribution_link_to_contribute(__('make another contribution')), "<a href='" . url('items/browse') . "'>" . __('browse the archive') . "</a>"); ?>
    </p>

    <?php if (get_option('contribution_open') && !current_user()): ?>
    <p><?php echo __("If you would like to interact with the site further, you can use an account that is ready for you. Visit %s, and request a new password for the email you used", "<a href='" . url('users/forgot-password') . "'>" . __('this page') . "</a>"); ?>
        <?php endif; ?>
</div>
<?php echo foot(); ?>