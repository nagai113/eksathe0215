<!--<ul>
<li class="sideBnr" id="sideContact"><a href="<?php biz_vektor_contact_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/bnr_contact.png" alt="お問い合わせ"></a></li>
</ul>-->
<div class="sideWidget" id="search">
<!--<?php get_search_form(); ?>--><!--検索窓だよ-->
</div>

<?php if (is_home() || is_front_page()) :
dynamic_sidebar( 'top-side-widget-area' );
endif; ?>

<?php dynamic_sidebar( 'primary-widget-area' ); ?>

<?php biz_vektor_snsBnrs(); ?>
<?php biz_vektor_fbLikeBoxSide(); ?>

<?php dynamic_sidebar( 'secondary-widget-area' ); ?>