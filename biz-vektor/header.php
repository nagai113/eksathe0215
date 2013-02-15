<!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=320, initial-scale=1.0, user-scalable=yes, maximum-scale=2.0, minimum-scale=1.0, ">
<title><?php getHeadTitle(); ?></title>
<meta name="description" content="<?php getHeadDescription(); ?>" />
<meta name="keywords" content="<?php biz_vektor_getHeadKeywords(); //テーマオプションでBizVektor特有の値（共通キーワード）を使用?>" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:700|Lato:900|Anton' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="start" href="<?php echo site_url(); ?>" title="ホーム" />
<?php biz_vektor_ogp(); ?>
<?php biz_vektor_theme_style(); ?>
<?php biz_vektor_gMenuDivide(); ?>
<script type="text/javascript">
function inFacebookPageCheck()	{
	if( top.location != this.location ){
		document.getElementById("wrap").className = "inFacebook";
	}
}
window.onload = inFacebookPageCheck;
</script>


<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<?php if (is_front_page()) { ?>

<?php // ▼スライドショーがある場合 ?>
<?php if (biz_vektor_slideExist()) { ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/FlexSlider/flexslider.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/FlexSlider/jquery.flexslider.js"></script>

<script type="text/javascript" charset="utf-8">
  jQuery(window).load(function() {
    jQuery('.flexslider').flexslider();
  });
</script>

<?php } ?>
<?php } ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/master.js"></script>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php biz_vektor_googleAnalytics(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=<?php biz_vektor_fbAppId(); ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="wrap">
<?php
if ( is_user_logged_in() == TRUE ) { ?>
<?php get_template_part('module_adminHeader'); ?>
<?php } ?>

<!-- [ #headerTop ] -->
<div id="headerTop">
<div class="innerBox">
<div id="site-description"><?php bloginfo( 'description' ); ?></div>
</div>
</div><!-- [ /#headerTop ] -->

<!-- [ #header ] -->
<div id="header">
<div id="headerInner" class="innerBox">
<!-- [ #headLogo ] -->
<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
<<?php echo $heading_tag; ?> id="site-title">
<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>" rel="home">
<?php biz_vektor_print_headLogo(); ?>
</a>
</<?php echo $heading_tag; ?>>
<!-- [ #headLogo ] -->

<!-- [ #headContact ] -->
<?php biz_vektor_print_headContact(); ?>
<!-- [ /#headContact ] -->


</div>
<!-- #headerInner -->
</div>
<!-- [ /#header ] -->

<!-- [ #gMenu ] -->
<div id="gMenu" class="menuClose" onMouseOver="this.className='menuOpen'" onMouseOut="this.className='menuClose'">
<div id="gMenuInner" class="innerBox">
<h3 class="assistive-text"><span>MENU</span></h3>
<div class="skip-link screen-reader-text"><a href="#content" title="メニューを飛ばす">メニューを飛ばす</a></div>

<?php wp_nav_menu( array(
 'theme_location' => 'Header',
 'container' => 'ul',
 //'menu_class' => 'nav',
 'echo' => true,
 //'before' => '',
 //'after' => '',
 //'link_before' => '',
 //'link_after' => '',
 //'depth' => 0,
 'walker' => new description_walker())
 ); ?>
</div><!-- [ /#gMenuInner ] -->
</div>
<!-- [ /#gMenu ] -->


<?php if (!is_front_page()) { ?>
<div id="pageTitBnr">
<div class="innerBox">
<div id="pageTitInner" >
	
	<?php if (get_post_type() === 'info' && (is_category() || is_single() || is_archive() || is_home())) { ?>
	<div id="pageTit">お知らせ</div>
	<?php } elseif ( is_attachment() ) { ?>
	<div id="pageTit"><?php the_title(); ?></div>
	<?php /* ▼カテゴリーページ || 投稿記事 || アーカイブ || 投稿のトップページ */ ?>
	<?php } else if (is_category() || is_single() || is_archive() || is_home()) { ?>
	<div id="pageTit">ブログ</div>
	<?php /* ▼単一ページ */ ?>
	<?php } else if (is_page()) { ?>
	<h1 id="pageTit"><?php the_title(); ?> <?php edit_post_link('編集', '<span class="edit-link">（', '）' ); ?></h1>
	<?php /* ▼タグアーカイブ */ ?>
	<?php } else if (is_tag()) { ?>
	<h1 id="pageTit">タグ別アーカイブ：<?php single_tag_title();?></h1>
	<?php /* ▼検索結果 */ ?>
	<?php } else if (is_search()) { ?>
	<h1 id="pageTit">『<?php echo get_search_query(); ?>』の検索結果</h1>
	<?php /* ▼それ以外 */ ?>
	<?php } else { ?>
	<h1 id="pageTit">ページが見つかりません</h1>
	<?php /* ▲それ以外 */ ?>
<?php } ?>
</div><!-- [ /#pageTitInner ] -->
</div>
</div><!-- [ /#pageTitBnr ] -->
<?php } ?>

<!-- [ #panList ] -->
<div id="panList">
<div id="panListInner" class="innerBox">
<?php get_panList(); ?>
</div>
</div>
<!-- [ /#panList ] -->
<div id="main">