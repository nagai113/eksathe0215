<?php /* Template Name: サイトマップ（スラッグ：sitemap）*/ get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
<!-- [ #content ] -->
<div id="content" class="wide">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
<div id="sitemapPageList">
<ul class="linkList">
<?php wp_list_pages('title_li='); ?>
</ul>
</div>
<!-- [ #sitemapPostList ] -->
<div id="sitemapPostList">

<!-- [ お知らせ ] -->
<?php $loop = new WP_Query( array( 'post_type' => 'info' ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post();
$postCount = ++$postCount;
endwhile;
if ($postCount): ?>
<ul class="linkList">
<li>お知らせ
	<ul>
	<?php wp_list_categories('taxonomy=info-cat&title_li=&orderby=order'); ?>
	</ul>
</li>
</ul>
<?php endif;?>
<?php wp_reset_query(); ?>
<!-- [ /お知らせ ] -->
<!-- [ ブログ ] -->
<?php query_posts("showposts=-0"); ?>
<?php if(have_posts()): ?>
<ul class="linkList">
<li>ブログ
	<ul>
	<?php wp_list_categories('title_li='); ?> 
	</ul>
</li>
</ul>
<?php endif;?>
<?php wp_reset_query(); ?>
<!-- [ /ブログ ] -->

</div>
<!-- [ #sitemapPostList ] -->
<?php endwhile; ?>

</div>
<!-- [ /#content ] -->
</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
