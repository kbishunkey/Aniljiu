<?php if (is_active_sidebar('page_sidebar')) : ?>
<section class="rocksite-t-content-layout__sidebar">
    <ul id="sidebar" class="rocksite-o-sidebar">
        <?php
        dynamic_sidebar('page_sidebar'); ?>
    </ul>
</section>
<?php endif; ?>