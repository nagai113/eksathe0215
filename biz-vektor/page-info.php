<?php /* Template Name: お知らせトップ（スラッグ:info） */ get_header(); ?>

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

<?php $loop = new WP_Query( array( 'post_type' => 'info', 'posts_per_page' => 20 ) ); ?>
<div id="topInfo" class="infoList">

<?php
$options = biz_vektor_get_theme_options();
if ( $options['listInfoArchive'] == 'listType_set' ) { ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
		<?php get_template_part('module_loop_info2'); ?>
	<?php endwhile; ?>
<?php } else { ?>
	<ul class="entryList">
	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
		<?php get_template_part('module_loop_info'); ?>
	<?php endwhile; ?>
	</ul>
<?php } ?>

</div><!-- [ /#topInfo ] -->

	</div>
	<!-- [ /#content ] -->

<!-- [ #sideTower ] -->
<div id="sideTower">
	<?php get_template_part('module_side_info'); ?>
	<div class="localSection">
	<?php get_sidebar(); ?>
	</div>
</div>
<!-- [ /#sideTower ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>