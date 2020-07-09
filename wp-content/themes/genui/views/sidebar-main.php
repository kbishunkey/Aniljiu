<?php if (is_active_sidebar('main_sidebar')) : ?>
<section class="rocksite-t-content-layout__sidebar">
    <ul id="sidebar" class="rocksite-o-sidebar">
        <?php
        dynamic_sidebar('main_sidebar'); ?>
    </ul>
</section>
<?php endif; ?>