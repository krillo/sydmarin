<form action="/" method="get" id="search-form">
    <fieldset id="search-fields">
        <input type="text" name="s" id="search-text" placeholder="SÖK" value="<?php the_search_query(); ?>" />
        <input type="image" alt="Search" id="search-img" src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/icon_search.png" />
    </fieldset>
</form>