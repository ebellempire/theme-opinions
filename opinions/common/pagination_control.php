<?php
if ($this->pageCount > 1):
    $getParams = $_GET;
?>
<nav class="pagination-nav" aria-label="<?php echo __('Pagination'); ?>">
    <ul class="pagination">

        <!-- Previous page link -->
        <li class="pagination_previous">
            <?php if (isset($this->previous)): ?>
            <?php $getParams['page'] = $previous; ?>
            <a class="button" rel="prev" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('Previous'); ?></a>
            <?php endif; ?>
        </li>

        <?php if (get_theme_option('show_pagination_input') == 1):?>
        <!-- Manual page input -->
        <li class="page-input">
            <form action="<?php echo html_escape($this->url()); ?>" method="get" accept-charset="utf-8">
                <?php
            $hiddenParams = array();
            $entries = explode('&', http_build_query($getParams));
            foreach ($entries as $entry) {
                if (!$entry) {
                    continue;
                }
                list($key, $value) = explode('=', $entry);
                $hiddenParams[urldecode($key)] = urldecode($value);
            }

            foreach ($hiddenParams as $key => $value) {
                if ($key != 'page') {
                    echo $this->formHidden($key, $value);
                }
            }

            // Manually create this input to allow an omitted ID
            $pageInput = '<input type="text" name="page" title="'
                        . html_escape(__('Current Page'))
                        . '" value="'
                        . html_escape($this->current) . '">';
            echo __('%s of %s', $pageInput, $this->last);
            ?>
            </form>
        </li>
        <?php endif;?>

        <!-- Next page link -->
        <li class="pagination_next">
            <?php if (isset($this->next)): ?>
            <?php $getParams['page'] = $next; ?>
            <a class="button" rel="next" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('Next'); ?></a>
            <?php endif; ?>
        </li>

    </ul>
</nav>

<?php endif; ?>