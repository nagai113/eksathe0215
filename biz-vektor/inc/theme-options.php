<?php 

/*-------------------------------------------*/
/*	レイアウト
/*-------------------------------------------*/
/*	テーマオプション入力画面
/*-------------------------------------------*/
/*	テーマスタイル
/*-------------------------------------------*/
/*	メニューボタンの数
/*-------------------------------------------*/
/*	ヘッダーロゴ
/*-------------------------------------------*/
/*	ヘッダー電話番号・受付時間
/*-------------------------------------------*/
/*	お問い合わせページURL出力
/*-------------------------------------------*/
/*	facebook twitter バナー出力
/*-------------------------------------------*/
/*	トップページPR
/*-------------------------------------------*/
/*	blogList
/*-------------------------------------------*/
/*	トップページ下部フリーエリア
/*-------------------------------------------*/
/*	bodyタグにレイアウトのクラス追加
/*-------------------------------------------*/
/*	OGP追加
/*-------------------------------------------*/
/*	中ページ下部問い合わせエリア
/*-------------------------------------------*/
/*	snsBtns
/*-------------------------------------------*/
/*	snsBtns 表示ページ設定
/*-------------------------------------------*/
/*	facebookコメント欄表示ページ設定
/*-------------------------------------------*/
/*	facebookアプリケーションID（faceboo関連パーツを使用する為にbody直下に書くタグに出力）
/*-------------------------------------------*/
/*	キーワード生成
/*-------------------------------------------*/
/*	フッター
/*-------------------------------------------*/
/*	GoogleAnalytics
/*-------------------------------------------*/
/*	スライドショー
/*-------------------------------------------*/

function biz_vektor_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'twentyeleven-theme-options', get_template_directory_uri() . '/inc/theme-options.css', false, '2011-04-28' );
	wp_enqueue_script( 'twentyeleven-theme-options', get_template_directory_uri() . '/inc/theme-options.js', array( 'farbtastic' ), '2011-06-10' );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'biz_vektor_admin_enqueue_scripts' );

function biz_vektor_theme_options_init() {

	if ( false === biz_vektor_get_theme_options() )
		add_option( 'biz_vektor_theme_options', biz_vektor_get_default_theme_options() );

	register_setting(
		'biz_vektor_options',
		'biz_vektor_theme_options',
		'biz_vektor_theme_options_validate'
	);
}
add_action( 'admin_init', 'biz_vektor_theme_options_init' );

function biz_vektor_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_biz_vektor_options', 'biz_vektor_option_page_capability' );

function biz_vektor_theme_options_add_page() {
	$theme_page = add_theme_page(
		'テーマオプション',   					// Name of page
		'テーマオプション',   					// Label in menu
		'edit_theme_options',                    // Capability required
		'theme_options',                         // Menu slug, used to uniquely identify the page
		'biz_vektor_theme_options_render_page' // Function that renders the options page
	);

	if ( ! $theme_page )
		return;

	$help = '<p>Some themes provide customization options that are grouped together on a Theme Options screen. If you change themes, options may change or disappear, as they are theme-specific. Your current theme, Twenty Eleven, provides the following Theme Options:</p>' .
			'<ol>' .
				'<li><strong>Color Scheme</strong>: You can choose a color palette of "Light" (light background with dark text) or "Dark" (dark background with light text) for your site.</li>' .
				'<li><strong>Link Color</strong>: You can choose the color used for text links on your site. You can enter the HTML color or hex code, or you can choose visually by clicking the "Select a Color" button to pick from a color wheel.</li>' .
				'<li><strong>Default Layout</strong>: You can choose if you want your site&#8217;s default layout to have a sidebar on the left, the right, or not at all.</li>' .
			'</ol>' .
			'<p>Remember to click "Save Changes" to save any changes you have made to the theme options.</p>' .
			'<p><strong>For more information:</strong></p>' .
			'<p><a href="http://codex.wordpress.org/Appearance_Theme_Options_Screen" target="_blank">Documentation on Theme Options</a></p>' .
			'<p><a href="http://wordpress.org/support/" target="_blank">Support Forums</a></p>';

	add_contextual_help( $theme_page, $help );
}
add_action( 'admin_menu', 'biz_vektor_theme_options_add_page' );


/*-------------------------------------------*/
/*	レイアウト
/*-------------------------------------------*/
function biz_vektor_layouts() {
	$layout_options = array(
		'content-sidebar' => array(
			'value' => 'content-sidebar',
			'label' => '右サイドバー',
			'thumbnail' => get_template_directory_uri() . '/inc/images/content-sidebar.png',
		),
		'sidebar-content' => array(
			'value' => 'sidebar-content',
			'label' => '左サイドバー',
			'thumbnail' => get_template_directory_uri() . '/inc/images/sidebar-content.png',
		),
	);

	return apply_filters( 'biz_vektor_layouts', $layout_options );
}

function biz_vektor_get_default_theme_options() {
	$default_theme_options = array(
		'theme_layout' => 'content-sidebar',
	);
/*
	if ( is_rtl() )
 		$default_theme_options['theme_layout'] = 'sidebar-content';
	return apply_filters( 'biz_vektor_default_theme_options', $default_theme_options );
*/
}

function biz_vektor_get_theme_options() {
	return get_option( 'biz_vektor_theme_options', biz_vektor_get_default_theme_options() );
}

/*-------------------------------------------*/
/*	テーマオプション入力画面
/*-------------------------------------------*/

get_template_part('inc/theme-options-edit');

/*-------------------------------------------*/
/*	テーマスタイル
/*-------------------------------------------*/

//	テーマ配列読み込み
function biz_vektor_theme_styleSetting() {
	global $biz_vektor_theme_styles;
	$biz_vektor_theme_styles = array(
		'plain' => array( 
			'label' => 'プレーン',
			'path' => get_template_directory_uri().'/styles/',
			'parent' => 'plain'
			),
		'001_red' => array(
			'label' => 'Default_赤',
			'path' => get_template_directory_uri().'/styles/',
			'parent' => 'BizVektor001'
			),
		'001_bizblue' => array(
			'label' => 'Default_紺',
			'path' => get_template_directory_uri().'/styles/',
			'parent' => 'BizVektor001'
			),
		'001_green' => array(
			'label' => 'Default_緑',
			'path' => get_template_directory_uri().'/styles/',
			'parent' => 'BizVektor001'
			),
		'001_bizgreen' => array(
			'label' => 'Default_深緑',
			'path' => get_template_directory_uri().'/styles/',
			'parent' => 'BizVektor001'
			), 
		'001_black' => array(
			'label' => 'Default_黒',
			'path' => get_template_directory_uri().'/styles/',
			'parent' => 'BizVektor001'
			),
		'001_daidai' => array(
			'label' => 'Default_橙',
			'path' => get_template_directory_uri().'/styles/',
			'parent' => 'BizVektor001'
			),
		'001_darkbrown' => array(
			'label' => 'Default_焦茶',
			'path' => get_template_directory_uri().'/styles/',
			'parent' => 'BizVektor001'
			),
	);
	// プラグインから拡張テーマ情報を受け取る
	if ( function_exists( 'biz_vektor_themePlus' ) ) {
		biz_vektor_themePlus();
	}
}

// ヘッダーに書き出し
function biz_vektor_theme_style() {
	// DBに入っている値を読み込み
	$options = biz_vektor_get_theme_options();

	// biz_vektor_theme_styles配列読み込み
	global $biz_vektor_theme_styles;
	biz_vektor_theme_styleSetting();

	// テーマスタイルが何も指定されていない場合
	if ($options['theme_style'] == '[ 選択して下さい ]' || ! $options['theme_style']) {
		print '<link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/styles/001_red.css" />'."\n";
		print '<!--[if lte IE 8]>'."\n";
		print '<link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/styles/BizVektor001_oldIE.css" />'."\n";
		print '<![endif]-->'."\n";
	} else {
		print '<link rel="stylesheet" type="text/css" media="all" href="'.$biz_vektor_theme_styles[$options['theme_style']]['path'].$options['theme_style'].'.css" />'."\n";
		print '<!--[if lte IE 8]>'."\n";
		print '<link rel="stylesheet" type="text/css" media="all" href="'.$biz_vektor_theme_styles[$options['theme_style']]['path'].$biz_vektor_theme_styles[$options['theme_style']]['parent'].'_oldIE.css" />'."\n";
		print '<![endif]-->'."\n";
		
	}
}

/*-------------------------------------------*/
/*	メニューボタンの数
/*-------------------------------------------*/
function biz_vektor_gMenuDivide() {
	$options = biz_vektor_get_theme_options();
	// メニューボタンが未設定の場合
	if ($options['gMenuDivide'] == '[ 選択して下さい ]' || ! $options['gMenuDivide'] || ($options['gMenuDivide'] == 'divide_natural') ) {
	//　それ以外
	} else {
		print '<link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/styles/gMenu_'.$options['gMenuDivide'].'.css" />'."\n";
		print '<!--[if lte IE 8]>'."\n";
		print '<link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/styles/gMenu_'.$options['gMenuDivide'].'_oldIE.css" />'."\n";
		print '<![endif]-->'."\n";
	}
}
/*-------------------------------------------*/
/*	ヘッダーロゴ
/*-------------------------------------------*/
function biz_vektor_print_headLogo() {
	$options = biz_vektor_get_theme_options();
	$head_logo = $options['head_logo'];
	if ($head_logo) {
		print '<img src="'.$head_logo.'" alt="'.get_bloginfo('name').'" />';
	} else {
		echo bloginfo('name');
	}
}
/*-------------------------------------------*/
/*	ヘッダー電話番号・受付時間
/*-------------------------------------------*/
function biz_vektor_print_headContact() {
	$options = biz_vektor_get_theme_options();
	$contact_txt = $options['contact_txt'];
	$tel_number = $options['tel_number'];
	$contact_time = $options['contact_time'];
	if ($tel_number) {
		print '<div id="headContact"><div id="headContactInner">'."\n";
		if ($contact_txt) {
			print '<div id="headContactTxt">'.$contact_txt.'</div>'."\n";
		}
		print '<div id="headContactTel">TEL '.$tel_number.'</div>'."\n";
		if ($contact_time) {
			print '<div id="headContactTime">'.$contact_time.'</div>'."\n";
		}
	print	'</div></div>';
	}
}

/*-------------------------------------------*/
/*	お問い合わせページURL出力
/*-------------------------------------------*/
function biz_vektor_contact_url() {	
	$options = biz_vektor_get_theme_options();
	echo $options['contact_link'];
}

/*-------------------------------------------*/
/*	facebook twitter バナー出力
/*-------------------------------------------*/
function biz_vektor_snsBnrs() {
	$options = biz_vektor_get_theme_options();
	$facebook = $options['facebook'];
	$twitter = $options['twitter'];
	if ($facebook || $twitter) {
		print '<ul id="snsBnr">';
		if ($facebook) { ?>
		<li><a href="<?php echo htmlspecialchars($facebook); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/bnr_facebook.gif" alt="facebook" /></a></li>
		<?php }
		if ($twitter) { ?>
		<li><a href="https://twitter.com/#!/<?php echo htmlspecialchars($twitter); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/bnr_twitter.gif" alt="twitter" /></a></li>
		<?php } 
		print '</ul>';
	}
}

/*-------------------------------------------*/
/*	トップページPR
/*-------------------------------------------*/
function biz_vektor_topPR()	{
	$options = biz_vektor_get_theme_options();
	$pr1_title =$options['pr1_title'];
	$pr2_title =  $options['pr2_title'];
	$pr3_title =  $options['pr3_title'];
	$pr1_description =  $options['pr1_description'];
	$pr2_description =  $options['pr2_description'];
	$pr3_description =  $options['pr3_description'];
	$pr1_link =  $options['pr1_link'];
	$pr2_link =  $options['pr2_link'];
	$pr3_link =  $options['pr3_link'];
	if ($pr1_title || $pr2_title || $pr3_title || $pr1_description || $pr2_description || $pr3_description || $pr1_link || $pr2_link || $pr3_link) {
?>
	<!-- [ #topPr ] -->
	<div id="topPr">
	<div id="topPrLeft" class="topPrOuter">
	<div class="topPrInner">
	<h3 class="topPrTit"><a href="<?php print(htmlspecialchars($pr1_link,ENT_QUOTES)); ?>"><?php print(htmlspecialchars($pr1_title,ENT_QUOTES)); ?></a></h3>
	<p class="topPrDescription"><a href="<?php print(htmlspecialchars($pr1_link,ENT_QUOTES)); ?>"><?php print(htmlspecialchars($pr1_description,ENT_QUOTES)); ?></a></p>
	<p class="moreLink"><a href="<?php print(htmlspecialchars($pr1_link,ENT_QUOTES)); ?>">詳しくはこちら</a></p>
	</div>
	</div><!-- /#topPrLeft -->
	
	<div id="topPrCenter" class="topPrOuter">
	<div class="topPrInner">
	<h3 class="topPrTit"><a href="<?php print(htmlspecialchars($pr2_link,ENT_QUOTES)); ?>"><?php print(htmlspecialchars($pr2_title,ENT_QUOTES)); ?></a></h3>
	<p class="topPrDescription"><a href="<?php print(htmlspecialchars($pr2_link,ENT_QUOTES)); ?>"><?php print(htmlspecialchars($pr2_description,ENT_QUOTES)); ?></a></p>
	<p class="moreLink"><a href="<?php print(htmlspecialchars($pr2_link,ENT_QUOTES)); ?>">詳しくはこちら</a></p>
	</div>
	</div><!-- /#topPrCenter -->
	
	<div id="topPrRight" class="topPrOuter">
	<div class="topPrInner">
	<h3 class="topPrTit"><a href="<?php print(htmlspecialchars($pr3_link,ENT_QUOTES)); ?>"><?php print(htmlspecialchars($pr3_title,ENT_QUOTES)); ?></a></h3>
	<p class="topPrDescription"><a href="<?php print(htmlspecialchars($pr3_link,ENT_QUOTES)); ?>"><?php print(htmlspecialchars($pr3_description,ENT_QUOTES)); ?></a></p>
	<p class="moreLink"><a href="<?php print(htmlspecialchars($pr3_link,ENT_QUOTES)); ?>">詳しくはこちら</a></p>
	</div>
	</div><!-- /#topPrRight -->
	<?php if ( is_user_logged_in() == TRUE ) {　?>
	<div class="adminEdit">
	<span class="mBtn"><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#topPage">編集</a></span>
	</div>
	<?php } ?>
	</div>
	<!-- [ #topPr ] -->
<?php
	}
}


/*-------------------------------------------*/
/*	blogList
/*-------------------------------------------*/
function biz_vektor_blogList()	{
	$options = biz_vektor_get_theme_options();
	$blogRss = $options['blogRss'];
	if ($blogRss) {
?>
	<div id="topBlog" class="infoList">
	<h2>新着ブログ記事</h2>
	<div class="rssBtn"><a href="<?php echo $blogRss ?>" id="blogRss">RSS</a></div>
		<?php
		$xml = simplexml_load_file($blogRss); 
		$count = 0;
		echo '<ul class="entryList">';    
		foreach($xml->channel->item as $entry){
		// アメブロの広告対策
		$entryTitJudge = mb_substr( $entry->title, 0, 3 );	// 先頭3文字でトリム
		if (!($entryTitJudge == 'PR:')) { 					// 先頭3文字がPR:でない記事のみ表示
			 $entrydate = date ( "Y.m.d",strtotime ( $entry->pubDate ) );
			 echo '<li><span class="infoDate">'.$entrydate.'</span>';
			 echo '<span class="infoTxt"><a href="'.$entry->link.'" target="_blank">'.$entry->title.'</a></span></li>';
			 $count++;
		}
		 if ($count > 4){break;}
		}
		echo "</ul>";
		?>
	</div><!-- [ /#topBlog ] -->
<?php
	}
}
/*-------------------------------------------*/
/*	トップページ下部フリーエリア
/*-------------------------------------------*/

function biz_vektor_topContentsBottom()	{
	$options = biz_vektor_get_theme_options();
	$topContentsBottom = $options['topContentsBottom'];
	if ($topContentsBottom) {
		echo '<div id="topContentsBottom">'."\n";
		echo $topContentsBottom;
		if ( is_user_logged_in() == TRUE ) {
			echo '<div class="adminEdit">'."\n";
			echo '<span class="mBtn"><a href="'.site_url().'/wp-admin/themes.php?page=theme_options#topPage">編集</a></span>'."\n";
			echo '</div>'."\n";
		}
		echo '</div>'."\n";
	}
}

/*-------------------------------------------*/
/*	bodyタグにレイアウトのクラス追加
/*-------------------------------------------*/
function biz_vektor_layout_classes( $existing_classes ) {
	$options = biz_vektor_get_theme_options();
	$current_layout = $options['theme_layout'];

	if ( in_array( $current_layout, array( 'content-sidebar', 'sidebar-content' ) ) )
		$classes = array( 'two-column' );
	else
		$classes = array( 'one-column' );

	if ( 'content-sidebar' == $current_layout )
		$classes[] = 'right-sidebar';
	elseif ( 'sidebar-content' == $current_layout )
		$classes[] = 'left-sidebar';
	else
		$classes[] = $current_layout;

	$classes = apply_filters( 'biz_vektor_layout_classes', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );
}
add_filter( 'body_class', 'biz_vektor_layout_classes' );


/*-------------------------------------------*/
/*	OGP追加
/*-------------------------------------------*/

function biz_vektor_ogp () {
	$options = biz_vektor_get_theme_options();
	//$ogpImage = $options['ogpImage'];
	//$fbAppId = $options['fbAppId'];
	global $wp_query;
	$post = $wp_query->get_queried_object();

	echo '<meta property="og:locale" content="ja_JP" />'."\n";
	echo '<meta property="og:site_name" content="'.get_bloginfo('name').'" />'."\n";
	echo '<meta property="og:url" content="'.get_permalink().'" />'."\n";
	if ($options['fbAppId']){
		echo '<meta property="fb:app_id" content="'.$options['fbAppId'].'" />'."\n";
	}
	// ▼ トップページ
	if (is_front_page() || is_home()) {
		echo '<meta property="og:type" content="website" />'."\n";
		if ($options['ogpImage']){
			echo '<meta property="og:image" content="'.$options['ogpImage'].'" />'."\n";
		}
		echo '<meta property="og:title" content="'.get_bloginfo('name').'" />'."\n";
		echo '<meta property="og:description" content="'.get_bloginfo('description').'"/>'."\n";
	// ▼ カテゴリー＆アーカイブ
	} else if (is_category() || is_archive()) {
		echo '<meta property="og:type" content="article" />'."\n";
		if ($options['ogpImage']){
			echo '<meta property="og:image" content="'.$options['ogpImage'].'" />'."\n";
		}
	// ▼ 固定ページ・投稿ページの場合
	} else if (is_page() || is_single()) {
		echo '<meta property="og:type" content="article" />'."\n";
		// image
		if (has_post_thumbnail()) {
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'thumbnail', true);
			echo '<meta property="og:image" content="'.$image_url[0].'" />'."\n";
		} else if ($options['ogpImage']){
			echo '<meta property="og:image" content="'.$options['ogpImage'].'" />'."\n";
		}
		// description
		$metaExcerpt = $post->post_excerpt;
		if ($metaExcerpt) {
			$metadescription = $post->post_excerpt;
		} else {
			$metadescription = mb_substr( strip_tags($post->post_content), 0, 240 ); // タグを無効化して240文字でトリム
			$metadescription = str_replace(array("\r\n","\r","\n"), ' ', $metadescription);  // 改行コード削除
		}
		echo '<meta property="og:title" content="'.get_the_title().' | '.get_bloginfo('name').'" />'."\n";
		echo '<meta property="og:description" content="'.$metadescription.'"/>'."\n";
	// 固定ページ・投稿ページ以外
	} else {
		echo '<meta property="og:type" content="article" />'."\n";
		if ($options['ogpImage']){
			echo '<meta property="og:image" content="'.$options['ogpImage'].'" />'."\n";
		}
	}
}

/*-------------------------------------------*/
/*	中ページ下部問い合わせエリア
/*-------------------------------------------*/
function biz_vektor_mainfootContact() {
	$options = biz_vektor_get_theme_options();
	$contact_txt = $options['contact_txt'];
	$tel_number = $options['tel_number'];
	$contact_time = $options['contact_time'];
		if ($contact_txt) {
			print '<span class="mainFootCatch">'.$contact_txt.'</span>'."\n";
		}
	if ($tel_number) {
	print '<span class="mainFootTel">TEL '.$tel_number.'</span>'."\n";
		if ($contact_time) {
			print '<span class="mainFootTime">'.$contact_time.'</span>'."\n";
		}
	}
}

/*-------------------------------------------*/
/*	snsBtns
/*-------------------------------------------*/
function twitterID() {
	$options = biz_vektor_get_theme_options();
	return $options['twitter'];
}
function mixiKey() {
	$options = biz_vektor_get_theme_options();
	return $options['mixiKey'];
}

/*-------------------------------------------*/
/*	snsBtns 表示ページ設定
/*-------------------------------------------*/
function biz_vektor_snsBtns() {
	$options = biz_vektor_get_theme_options();
	$snsBtnsFront = $options['snsBtnsFront'];
	$snsBtnsPage = $options['snsBtnsPage'];
	$snsBtnsPost = $options['snsBtnsPost'];
	$snsBtnsInfo = $options['snsBtnsInfo'];
	$snsBtnsHidden = $options['snsBtnsHidden'];
	global $wp_query;
	$post = $wp_query->get_queried_object();
	$snsHiddenFlag = false	;
	// $snsBtnsHidden を , で分割して $snsHiddens に配列として格納
	$snsHiddens = spliti(",",$snsBtnsHidden);
	// $snsHiddenに値を順番に入れて実行
	foreach( $snsHiddens as $snsHidden ){
		// 現在のIDと配列の数字が同じだった場合
		if (get_the_ID() == $snsHidden) {
			// $snsHiddenFlagフラグ立てる
			$snsHiddenFlag = true ;
		}
	}
	// フラグが立ってなかったら実行
	if (!$snsHiddenFlag) {
		if ((is_home() && $snsBtnsFront) || (is_page() && $snsBtnsPage) || (get_post_type() == 'info' && $snsBtnsInfo) || (is_single() && $snsBtnsPost) ) {
			get_template_part('module_snsBtns');
		}
	}
}

/*-------------------------------------------*/
/*	facebookコメント欄表示ページ設定
/*-------------------------------------------*/
function biz_vektor_fbComments() {
	$options = biz_vektor_get_theme_options();
	$fbCommentsFront = $options['fbCommentsFront'];
	$fbCommentsPage = $options['fbCommentsPage'];
	$fbCommentsPost = $options['fbCommentsPost'];
	$fbCommentsInfo = $options['fbCommentsInfo'];
	$fbCommentsHidden = $options['fbCommentsHidden'];
	global $wp_query;
	$post = $wp_query->get_queried_object();

	$fbCommentHiddenFlag = false ;
	// $snsBtnsHidden を , で分割して $snsHiddens に配列として格納
	$fbCommentHiddens = spliti(",",$fbCommentHidden);
	// $snsHiddenに値を順番に入れて実行
	foreach( $fbCommentHiddens as $fbCommentHidden ){
		// 現在のIDと配列の数字が同じだった場合
		if (get_the_ID() == $fbCommentHidden) {
			// $snsHiddenFlagフラグ立てる
			$fbCommentHiddenFlag = true ;
		}
	}
	// フラグが立ってなかったら実行
	if (!$fbCommentHiddenFlag) {
		if ((is_home() && $fbCommentsFront) || (is_page() && $fbCommentsPage) || (get_post_type() == 'info' && $fbCommentsInfo) || (is_single() && $fbCommentsPost) ) {
			//get_template_part('module_fbComment');
			?>
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="2" data-width="640"></div>
			<style>
			.fb-comments,
			.fb-comments iframe[style] { width:100% !important; }
			</style>
			<?php 
		}
	}
}

/*-------------------------------------------*/
/*	facebookLikeBox
/*-------------------------------------------*/
function biz_vektor_fbLikeBoxFront() {
	$options = biz_vektor_get_theme_options();
	$fbLikeBoxFront = $options['fbLikeBoxFront'];
	if ( $fbLikeBoxFront ) {
		biz_vektor_fbLikeBox();
	}
}
function biz_vektor_fbLikeBoxSide() {
	$options = biz_vektor_get_theme_options();
	$fbLikeBoxSide = $options['fbLikeBoxSide'];
	if ( $fbLikeBoxSide ) {
		biz_vektor_fbLikeBox();
	}
}
function biz_vektor_fbLikeBox() {
	$options = biz_vektor_get_theme_options();
	$fbLikeBoxURL = $options['fbLikeBoxURL'];
	$fbLikeBoxStream = $options['fbLikeBoxStream'];
	$fbLikeBoxFace = $options['fbLikeBoxFace'];
	$fbLikeBoxHeight = $options['fbLikeBoxHeight'];

	if ($fbLikeBoxStream) { $fbLikeBoxStream = 'true'; } else { $fbLikeBoxStream = 'false'; }
	if ($fbLikeBoxFace) { $fbLikeBoxFace = 'true'; } else { $fbLikeBoxFace = 'false'; }
	if ($fbLikeBoxHeight) {
		$fbLikeBoxHeight = 'data-height="'.$fbLikeBoxHeight.'" ';
	}
?>
<style type="text/css">
#fb-like-box	{ width:100% !important;}
</style>

<div id="fb-like-box">
<script type="text/javascript">
var element = document.getElementById("fb-like-box").offsetWidth;
document.write(
'<div class="fb-like-box" data-href="<?php echo $fbLikeBoxURL ?>" data-width="'+element+'" <?php echo $fbLikeBoxHeight ?>data-show-faces="<?php echo $fbLikeBoxFace ?>" data-stream="<?php echo $fbLikeBoxStream ?>" data-header="true"></div>'
);
</script>
</div>
<?php }



/*-------------------------------------------*/
/*	facebookアプリケーションID（faceboo関連パーツを使用する為にbody直下に書くタグに出力）
/*-------------------------------------------*/
function biz_vektor_fbAppId () {
	$options = biz_vektor_get_theme_options();
	$fbAppId = $options['fbAppId'];
	echo $fbAppId;
}

/*-------------------------------------------*/
/*	キーワード生成
/*-------------------------------------------*/
function biz_vektor_getHeadKeywords(){
	$options = biz_vektor_get_theme_options();
	$commonKeyWords = $options['commonKeyWords'];
	// カスタムフィールドの値を取得
	$entryKeyWords = post_custom('metaKeyword');
	// 共通キーワード表示
	echo $commonKeyWords;
	// 共通キーワードと個別キーワードが両方設定されている場合接続の , を出力
	if ($commonKeyWords && $entryKeyWords) {
		echo ',';
	}
	// 個別キーワード出力
	echo $entryKeyWords;
}

/*-------------------------------------------*/
/*	フッター
/*-------------------------------------------*/

function biz_vektor_footerSiteName() 		{
	$options = biz_vektor_get_theme_options();
	$subSiteName = nl2br($options['sub_sitename']);
	if ($subSiteName) {
		print $subSiteName;
	} else {
		bloginfo( 'name' );
	}
}
function biz_vektor_print_footContact() {
	$options = biz_vektor_get_theme_options();
	$contact_address = nl2br($options['contact_address']);
	if ($contact_address) {
		print $contact_address;
	}
}
function biz_vektor_footerCopyRight() 		{
	$options = biz_vektor_get_theme_options();
	$subSiteName = ($options['sub_sitename']);
	print 'Copyright &copy; <a href="'.home_url( '/' ).'" rel="home">';
	if ($subSiteName) {
		print $subSiteName;
	} else {
		bloginfo( 'name' );
	}
	print '</a> All Right Reserved.';

	if ( function_exists( 'biz_vektor_activation' ) ) {
		biz_vektor_activation_footer();
		} else {
		/* 利用規約上は消しても構いませんが、差し支えなければなるべく表示していただけると嬉しいです*/
		print '<div id="powerd">Powerd by <a href="https://ja.wordpress.org/">WordPress</a> &amp; <a href="http://www.bizVektor.com" target="_blank" title="BizVektor(ビズベクトル) WordPressテーマ">BizVektor Theme</a> by <a href="http://www.vektor-inc.co.jp" target="_blank" title="株式会社ベクトル -ホームページ制作・WordPressカスタマイズ- [ 愛知県名古屋市・あま市 ]">Vektor,Inc.</a> technology.</div>';
	}
}

/*-------------------------------------------*/
/*	GoogleAnalytics
/*-------------------------------------------*/
function biz_vektor_googleAnalytics(){
	$options = biz_vektor_get_theme_options();
	$gaID = $options['gaID'];
	if ($gaID) {
?>
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-<?php echo $gaID ?>']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	<?php 
	} 
}
/*-------------------------------------------*/
/*	スライドショー
/*-------------------------------------------*/
function biz_vektor_slideExist () {
	$options = biz_vektor_get_theme_options();
	if ($options['slide1image'] || $options['slide2image'] || $options['slide3image'] || $options['slide4image'] || $options['slide5image'] ){
	return true;
	}
}

function biz_vektor_slideBody(){
	$options = biz_vektor_get_theme_options();
	// 1
	if ($options['slide1image']) {
		print '<li>';
		if ($options['slide1link']) {
			print '<a href="'.$options['slide1link'].'">';
		}
		print '<img src="'.$options['slide1image'].'" alt="'.$options['slide1alt'].'" />';
		if ($options['slide1link']) {
			print '</a>';
		}
		print '</li>'."\n";
	}
	// 2
	if ($options['slide2image']) {
		print '<li>';
		if ($options['slide2link']) {
			print '<a href="'.$options['slide2link'].'">';
		}
		print '<img src="'.$options['slide2image'].'" alt="'.$options['slide2alt'].'" />';
		if ($options['slide2link']) {
			print '</a>';
		}
		print '</li>'."\n";
	}
	// 3
	if ($options['slide3image']) {
		print '<li>';
		if ($options['slide3link']) {
			print '<a href="'.$options['slide3link'].'">';
		}
		print '<img src="'.$options['slide3image'].'" alt="'.$options['slide3alt'].'" />';
		if ($options['slide3link']) {
			print '</a>';
		}
		print '</li>'."\n";
	}
	// 4
	if ($options['slide4image']) {
		print '<li>';
		if ($options['slide4link']) {
			print '<a href="'.$options['slide4link'].'">';
		}
		print '<img src="'.$options['slide4image'].'" alt="'.$options['slide4alt'].'" />';
		if ($options['slide4link']) {
			print '</a>';
		}
		print '</li>'."\n";
	}
	// 5
	if ($options['slide5image']) {
		print '<li>';
		if ($options['slide5link']) {
			print '<a href="'.$options['slide5link'].'">';
		}
		print '<img src="'.$options['slide5image'].'" alt="'.$options['slide5alt'].'" />';
		if ($options['slide5link']) {
			print '</a>';
		}
		print '</li>'."\n";
	}
}
