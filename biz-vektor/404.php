<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
<!-- [ #content ] -->
<div id="content" class="wide">

	<div class="error404">
		<?php get_search_form(); ?>
	</div>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<!-- [ #sitemapOuter ] -->
<div id="sitemapOuter">
<!-- [ #sitemapPageList ] -->
<div id="sitemapPageList">
	<ul class="linkList">
	<?php wp_list_pages('title_li='); ?>
	</ul>
</div>
<!-- [ /#sitemapPageList ] -->

<!-- [ #sitemapPostList ] -->
<div id="sitemapPostList">
	<ul class="linkList">
	<li>お知らせ
		<ul>
		<?php wp_list_categories('taxonomy=info-cat&title_li=&orderby=order'); ?>
		</ul>
	</li>
	<li>ブログ
		<ul>
		<?php wp_list_categories('title_li='); ?> 
		</ul>
	</li>
	</ul>
</div>
<!-- [ #sitemapPostList ] -->
</div>
<!-- [ /#sitemapOuter ] -->
</div>
<!-- [ /#content ] -->
</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>