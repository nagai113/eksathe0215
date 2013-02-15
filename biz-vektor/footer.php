<?php
/**
 * The template for displaying the footer.
 */
?>
</div><!-- #main -->

<div id="pagetop">
<div id="pagetopInner" class="innerBox">
<a href="#headerTop">PAGETOP</a>
</div>
</div>

<div id="footMenu">
<div id="footMenuInner" class="innerBox">
<?php wp_nav_menu( array( 'theme_location' => 'FooterNavi','fallback_cb' => '' ) ); ?>
</div>
</div>


<!-- [ #footer ] -->
<div id="footer">
<!-- [ #footerInner ] -->
<div id="footerInner" class="innerBox">
<dl id="footerOutline">
<dt><?php biz_vektor_footerSiteName(); ?></dt>
<dd>
<?php biz_vektor_print_footContact(); ?>
</dd>
</dl>

<!-- [ #footerSiteMap ] -->
<div id="footerSiteMap">
<?php wp_nav_menu( array( 'theme_location' => 'FooterSiteMap' ) ); ?>
</div>
<!-- [ /#footerSiteMap ] -->

</div>
<!-- [ /#footerInner ] -->
</div>
<!-- [ /#footer ] -->


<!-- [ #siteBottom ] -->
<div id="siteBottom">
<div id="siteBottomInner" class="innerBox">
Copyright © eksathe All Right Reserved.
</div>
</div>
<!-- [ /#siteBottom ] -->
</div>
<!-- [ /#wrap ] -->
<!-- GooglePlusOne -->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'ja'}
</script>
<!-- /GooglePlusOne -->
</body>
</html>