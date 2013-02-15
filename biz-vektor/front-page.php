<?php
/**
 * The main template file.
 */
get_header(); ?>

<div id="topMainBnr">
<div id="topMainBnrFrame" class="flexslider">
<?php if(biz_vektor_slideExist()) { ?>
	<ul class="slides">
	<?php biz_vektor_slideBody(); ?>
	</ul>
<?php } else { ?>
	<div id="topManiBnrInnerFrame"><img src="<?php header_image(); ?>" alt="" /></div>
<?php } ?>
</div>
</div>

<!-- [ #container ] -->
<div id="container" class="innerBox">
	<!-- [ #content ] -->
	<div id="content">

<?php if ( have_posts()) : the_post(); ?>
	<?php
	$topFreeContent = NULL;
	$topFreeContent = get_the_content();
	if ($topFreeContent) { ?>
		<div id="topFreeArea">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
		</div>
	<?php } ?>	
<?php if ( is_user_logged_in() == TRUE ) {　?>
<div class="adminEdit">
	<span class="mBtn" style="float:left;margin-right:10px;"><?php edit_post_link( '▲ 編集', '<span class="edit-link">', '</span>' ); ?></span>
	<span class="mBtn"><a href="<?php echo site_url(); ?>/wp-admin/options-reading.php">▲ 表示するページを変更</a></span>
</div>
<?php } ?>

<?php endif; ?>

<?php biz_vektor_topPR(); ?>

<?php $loop = new WP_Query( array( 'post_type' => 'info', 'posts_per_page' => 5 ) ); ?>
<?php
while ( $loop->have_posts() ) : $loop->the_post();
$postCount = ++$postCount;
endwhile;
if ($postCount) :
?>
<div id="topInfo" class="infoList">
<h2>お知らせ</h2>
<div class="rssBtn"><a href="<?php echo home_url(); ?>/feed/?post_type=info" id="infoRss" target="_blank">RSS</a></div>
<?php
$options = biz_vektor_get_theme_options();
if ( $options['listInfoTop'] == 'listType_set' ) { ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
		<?php get_template_part('module_loop_info2'); ?>
	<?php endwhile ?>
<?php } else { ?>
	<ul class="entryList">
	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
		<?php get_template_part('module_loop_info'); ?>
	<?php endwhile; ?>
	</ul>
<?php } ?>
</div><!-- [ /#topInfo ] -->
<?php endif;?>

<?php query_posts("showposts=5"); ?>
<?php if(have_posts()): ?>
<div id="topBlog" class="infoList">
<h2>ブログ</h2>
<div class="rssBtn"><a href="<?php echo home_url(); ?>/feed/?post_type=post" id="blogRss" target="_blank">RSS</a></div>
<?php
$options = biz_vektor_get_theme_options();
if ( $options['listBlogTop'] == 'listType_set' ) {
	get_template_part('module_loop_blog2');
} else {
	get_template_part('module_loop_blog');
} ?>
</div><!-- [ /#topBlog ] -->
<?php endif;?>

<?php biz_vektor_blogList() // 外部ブログ新着インポート ?>

<?php biz_vektor_topContentsBottom(); ?>

<?php biz_vektor_fbLikeBoxFront(); ?>
<?php biz_vektor_snsBtns(); ?>
<?php biz_vektor_fbComments(); ?>


	</div>
	<!-- [ /#content ] -->
	
	<!-- [ #sideTower ] -->
	<div id="sideTower">
	<?php get_sidebar(); ?>
	</div>
	<!-- [ /#sideTower ] -->
</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>