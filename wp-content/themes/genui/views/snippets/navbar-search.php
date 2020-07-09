<div class="rocksite-o-search-navbar">

    <form id="searchForm" class="rocksite-m-input-connections -searchform rocksite-o-search-navbar__search-box"
          action="<?php echo esc_url( home_url('/') ); ?>" method="get"
          novalidate="novalidate">


        <div class="rocksite-m-input-connections__group">
            <input type="text" value="" tabindex="0" name="s" class="rocksite-m-input-connections__group__input" id="navbar-search-input"
                   placeholder="<?php esc_attr_e('Search', 'genui') ?>">

	<span class="rocksite-m-input-connections__group__btn">
	    <button class="rocksite-a-button-icon -secondary">
            <i class="la la-search"></i>
        </button>
    </span>
        </div>

    </form>
    <a href="#" class="rocksite-a-button-icon rocksite-o-search-navbar__close -transparent js-close-search" tabindex="0"><i class="la la-close"></i></a>
</div>