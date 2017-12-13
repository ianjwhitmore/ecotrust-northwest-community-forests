<form action="<?php echo esc_url(home_url()); ?>" method="get">
        <input type="text" id="s" name="s" value="<?php echo get_search_query(); ?>" placeholder="Search...">
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>