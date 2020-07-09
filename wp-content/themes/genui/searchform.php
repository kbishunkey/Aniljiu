<form role="search" method="get" class="rocksite-m-input-connections -searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="rocksite-m-input-connections__group">
        <input type="text" value="" name="s" class="rocksite-m-input-connections__group__input js-search-input" id="rocksite-search-form-input" placeholder="<?php esc_attr_e('Search', 'genui'); ?>">

        <span class="rocksite-m-input-connections__group__btn">
    <button class="rocksite-a-button-icon -secondary">
		<i class="la la-search"></i>
        <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'genui'); ?></span>
	</button>

    </span>
    </div>
</form>
