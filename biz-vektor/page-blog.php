<?php /* Template Name: ブログトップ（スラッグ:blog） */ get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
	<!-- [ #content ] -->
	<div id="content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
	<?php //	 ▼編集を出力
	if ( is_user_logged_in() == TRUE ) {　?>
	<div class="adminEdit">
	<span class="mBtn"><?php edit_post_link('編集', '<span class="edit-link">', '</span>' ); ?></span>
	</div>
	<?php }  // ▲編集を出力 ?>
<?php endwhile; ?>

<?php query_posts("showposts=20"); ?>
<?php if(have_posts()): ?>
<div id="topBlog" class="infoList">
<?php
$options = biz_vektor_get_theme_options();
if ( $options['listBlogArchive'] == 'listType_set' ) {
	get_template_part('module_loop_blog2');
} else {
	get_template_part('module_loop_blog');
} ?>
</div><!-- [ /#topBlog ] -->
<?php endif;?>

	</div>
	<!-- [ /#content ] -->

<!-- [ #sideTower ] -->
<div id="sideTower">
	<?php get_template_part('module_side_blog'); ?>
	<div class="localSection">
	<?php get_sidebar(); ?>
	</div>
</div>
<!-- [ /#sideTower ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>