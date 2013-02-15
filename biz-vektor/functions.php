<?php
/*-------------------------------------------*/
/*	Set content width
/* 	(Auto set up to media max with.)
/*-------------------------------------------*/
/*	カスタムメニュー
/*-------------------------------------------*/
/*	ウィジェット
/*-------------------------------------------*/
/*	カスタムヘッダー
/*-------------------------------------------*/
/*	テーマオプションを呼び出す
/*-------------------------------------------*/
/*	管理画面_スタイルを追加
/*-------------------------------------------*/
/*	管理画面_ビジュアルエディタでのcss指定
/*-------------------------------------------*/
/*	管理画面_オリジナル管理バーを追加
/*-------------------------------------------*/
/*	管理画面_アイキャッチが使えるように
/*-------------------------------------------*/
/*	管理画面_ダッシュボードから余分な項目を削除
/*-------------------------------------------*/
/*	管理画面_固定ページのカスタマイズ
/*-------------------------------------------*/
/*	管理画面_投稿のカスタマイズ
/*-------------------------------------------*/
/*	カスタム投稿タイプ_お知らせの追加
/*-------------------------------------------*/
/*	パンくずリスト
/*-------------------------------------------*/
/*	カスタム分類でaタグ無しで出力する
/*-------------------------------------------*/
/*	title 生成
/*-------------------------------------------*/
/*	description 生成
/*-------------------------------------------*/
/*	keyword 生成
/*-------------------------------------------*/
/*	抜粋の後につく [...] を変換
/*-------------------------------------------*/
/*	抜粋のpタグ自動挿入解除
/*-------------------------------------------*/
/*	年別アーカイブリストの“年”をaタグの中に置換
/*-------------------------------------------*/
/*	画像挿入時のwidthとheight指定削除
/*	（スマホ表示の際に画像サイズ自動調整がうまくいかない為）
/*-------------------------------------------*/
/*	Comment
/*-------------------------------------------*/
/*	Archive page link ( don't erase )
/*-------------------------------------------*/
/*	Comment out short code
/*-------------------------------------------*/

// ▼TinyMCEでGoogleMap (iframeタグの消去禁止指定）
// ▼管理バー非表示
// ▼メニューに「すべての設定」項目を加える

add_theme_support( 'automatic-feed-links' );

/*-------------------------------------------*/
/*	Set content width
/* 	(Auto set up to media max with.)
/*-------------------------------------------*/
if ( ! isset( $content_width ) )
    $content_width = 640;

/*-------------------------------------------*/
/*	カスタムメニュー
/*-------------------------------------------*/
register_nav_menus( array( 'Header' => 'Header Navigation', ) );
register_nav_menus( array( 'FooterNavi' => 'Footer Navigation', ) );
register_nav_menus( array( 'FooterSiteMap' => 'Footer SiteMap', ) );

/*-------------------------------------------*/
/*	ウィジェット
/*-------------------------------------------*/
function biz_vektor_widgets_init() {
	register_sidebar( array(
		'name' => __( 'サイドバーウィジェット（トップのみ）', 'biz_vektor' ),
		'id' => 'top-side-widget-area',
		'description' => __( 'トップページにのみ表示されるサイドバーウィジェットです。ドラッグ＆ドロップで必要なものだけ入れてください。バナーやブログパーツなどは、『テキスト』ウィジェットを使用して、ソースコードを張り付けられます。サイドバーウィジェット（共通）の上に表示されます。', 'biz_vektor' ),
		'before_widget' => '<div class="sideWidget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="localHead">',
		'after_title' => '</h3>',
	) );
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'サイドバーウィジェット（共通・上）', 'biz_vektor' ),
		'id' => 'primary-widget-area',
		'description' => __( 'サイドバーに表示するウィジェットです。facebook,twitterバナーの上に表示されます。', 'biz_vektor' ),
		'before_widget' => '<div class="sideWidget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="localHead">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'サイドバーウィジェット（共通・下）', 'biz_vektor' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'サイドバーに表示するウィジェットです。facebook,twitterバナーの下に表示されます。', 'biz_vektor' ),
		'before_widget' => '<div class="sideWidget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="localHead">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'biz_vektor_widgets_init' );


/*-------------------------------------------*/
/*	カスタムヘッダー
/*-------------------------------------------*/

// カスタムヘッダーのテキスト機能を利用する場合
define( 'HEADER_TEXTCOLOR', '' );
// カスタムヘッダーのテキスト機能をオフにする
define( 'NO_HEADER_TEXT', true );

define('HEADER_IMAGE', '%s/images/headers/bussines_desk_02.jpg');
define('HEADER_IMAGE_WIDTH', 950);
define('HEADER_IMAGE_HEIGHT', 250);
	register_default_headers( array(
		'bussines_desk_02' => array(
			'url' => '%s/images/headers/bussines_desk_02.jpg',
			'thumbnail_url' => '%s/images/headers/bussines_desk_02-thumbnail.jpg',
			'description' => 'Bussines desk01'
		),
		'bussines_desk_01' => array(
			'url' => '%s/images/headers/bussines_desk_01.jpg',
			'thumbnail_url' => '%s/images/headers/bussines_desk_01-thumbnail.jpg',
			'description' => 'Bussines desk01'
		),
		'autumn-leaves' => array(
			'url' => '%s/images/headers/autumn-leaves.jpg',
			'thumbnail_url' => '%s/images/headers/autumn-leaves-thumbnail.jpg',
			'description' => 'autumn-leaves'
		),
		'johnny_01' => array(
			'url' => '%s/images/headers/johnny_01.jpg',
			'thumbnail_url' => '%s/images/headers/johnny_01-thumbnail.jpg',
			'description' => 'Johnny'
		),
	) );
add_custom_image_header('admin_header_style', ''); 
if ( ! function_exists( 'admin_header_style' ) ) ://wp_headで<head>にCSSを追加。無いとエラーが出るので削除不可
function admin_header_style() { }
endif;

/*-------------------------------------------*/
/*	テーマオプションを呼び出す
/*-------------------------------------------*/
	require( dirname( __FILE__ ) . '/inc/theme-options.php' );

/*-------------------------------------------*/
/*	管理画面_スタイルを追加
/*-------------------------------------------*/
function bizVektor_admin_css(){
	echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/style_BizVektor_admin.css" />';
}
add_action('admin_head', 'bizVektor_admin_css', 11);

/*-------------------------------------------*/
/*	管理画面_ビジュアルエディタでのcss指定
/*-------------------------------------------*/
add_editor_style('editor-style.css');

/*-------------------------------------------*/
/*	管理画面_オリジナル管理バーを追加
/*-------------------------------------------*/
function original_header_menu_output() {
	get_template_part('module_adminHeader'); 
}
add_action('admin_notices','original_header_menu_output');

// ▼管理バー非表示
add_filter( 'show_admin_bar', '__return_false' );
// ▲管理バー非表示


/*-------------------------------------------*/
/*	管理画面_ダッシュボードから余分な項目を削除
/*-------------------------------------------*/
function remove_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);//被リンク
//  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);//現在の状況
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);//プラグイン
 // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);//最近のコメント
//  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);//クイック投稿
//  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);//最近の下書き
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);//WordPress開発ブログ
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);//WordPressフォーラム  
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

/*		「ようこそ」をとりあえず削除（完全に機能停止ではなくチェックすれば再表示可能になってしまう）
/*-------------------------------------------*/
function hide_welcome_panel() {
	$user_id = get_current_user_id();
		if ( 1 == get_user_meta( $user_id, 'show_welcome_panel', true ) )
	update_user_meta( $user_id, 'show_welcome_panel', 0 );
}
add_action( 'load-index.php', 'hide_welcome_panel' );

/*-------------------------------------------*/
/*	管理画面_アイキャッチが使えるように
/*-------------------------------------------*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true );

/*-------------------------------------------*/
/*	管理画面_固定ページのカスタマイズ
/*-------------------------------------------*/
add_post_type_support( 'page', 'excerpt' ); // 抜粋欄を追加

function remove_default_page_screen_metaboxes() {
	remove_meta_box( 'postcustom','page','normal' );		// カスタムフィールド
//	remove_meta_box( 'postexcerpt','page','normal' );		// 抜粋
	remove_meta_box( 'commentstatusdiv','page','normal' );	// ディスカッション
	remove_meta_box( 'commentsdiv','page','normal' );		// コメント
	remove_meta_box( 'trackbacksdiv','page','normal' );		// トラックバック
//	remove_meta_box( 'authordiv','page','normal' );			// 作成者
//	remove_meta_box( 'slugdiv','page','normal' );			// スラッグ
//	remove_meta_box( 'revisionsdiv','page','normal' );		// リビジョン
 }
add_action('admin_menu','remove_default_page_screen_metaboxes');

/*-------------------------------------------*/
/*	管理画面_投稿のカスタマイズ
/*-------------------------------------------*/
function remove_default_post_screen_metaboxes() {
	remove_meta_box( 'postcustom','post','normal' );			// カスタムフィールド
//	remove_meta_box( 'postexcerpt','post','normal' );			// 抜粋
//	remove_meta_box( 'commentstatusdiv','post','normal' );		// コメント
//	remove_meta_box( 'trackbacksdiv','post','normal' );			// トラックバック
//	remove_meta_box( 'slugdiv','post','normal' );				// スラッグ
	remove_meta_box( 'authordiv','post','normal' );				// 作成者
 }
 add_action('admin_menu','remove_default_post_screen_metaboxes');
 
/*-------------------------------------------*/
/*	カスタム投稿タイプ_お知らせの追加
/*-------------------------------------------*/
add_action( 'init', 'create_post_type', 0 );
function create_post_type() {
  register_post_type( 'info', /* post-type */
    array(
      'labels' => array(
      'name' => 'お知らせ',
      'singular_name' => 'お知らせ一覧'
      ),
      'public' => true,
      'menu_position' =>5,
	  'has_archive' => 'info/archive/',
	  'supports' => array('title','editor','excerpt','thumbnail')
    )
  );
  // お知らせのカテゴリーを設定
  register_taxonomy(
    'info-cat',
    'info',
    array(
      'hierarchical' => true,
      'update_count_callback' => '_update_post_term_count',
      'label' => 'お知らせカテゴリー',
      'singular_label' => 'お知らせカテゴリー',
      'public' => true,
      'show_ui' => true,
	  'menu-order' => true,
    )
  ); 
}

add_action( 'generate_rewrite_rules', 'my_rewrite' );
function my_rewrite( $wp_rewrite ){
    $taxonomies = get_taxonomies();
    $taxonomies = array_slice($taxonomies,4,count($taxonomies)-1);
    foreach ( $taxonomies as $taxonomy ) :
         $post_types = get_taxonomy($taxonomy)->object_type;
 
        foreach ($post_types as $post_type){
            $new_rules[$post_type.'/'.$taxonomy.'/(.+?)/?$'] = 'index.php?taxonomy='.$taxonomy.'&term='.$wp_rewrite->preg_index(1);
        }
         $wp_rewrite->rules = array_merge($new_rules, $wp_rewrite->rules);
     endforeach;
}

/*		カスタム分類のパーマリンクを“/カスタム投稿名/カスタム分類名/項目”にする。
/*-------------------------------------------*/
add_filter( 'term_link', 'my_term_link' ,10,3);
function my_term_link( $termlink, $term, $taxonomy){
    $t=get_taxonomy($taxonomy);
    $wp_home = home_url();
 
    $post_type = $t->object_type[0];
	if ($post_type == 'info') {
		if(!isset($t->object_type[1])) {
			$termlink = str_replace($wp_home,$wp_home."/".$post_type,$termlink);
		}
	}
    return $termlink;
}

/*		カスタム投稿タイプのアーカイブ出力
/*-------------------------------------------*/
global $my_archives_post_type;
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
  global $my_archives_post_type;
  if ( isset($r['post_type']) ) {
    $my_archives_post_type = $r['post_type'];
    $where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
  } else {
    $my_archives_post_type = '';
  }
  return $where;
}
add_filter( 'get_archives_link', 'my_get_archives_link' );
function my_get_archives_link( $link_html ) {
  global $my_archives_post_type;
  if ( '' != $my_archives_post_type )
    $add_link .= '?post_type=' . $my_archives_post_type;
	$link_html = preg_replace("/href=\'(.+)\'\s/","href='$1".$add_link."'",$link_html);
  return $link_html;
}

/*		カスタム投稿タイプのRSS出力
			0.4.1で廃止
/*-------------------------------------------*/
/*
function custom_post_rss_set($query) {
    if(is_feed()) {
		$query->set('post_type',Array('post','info',));
        return $query;
    }
}
add_filter('pre_get_posts', 'custom_post_rss_set');
*/

/*-------------------------------------------*/
/*	パンくずリスト
/*-------------------------------------------*/
function get_panList(){
	global $wp_query;
	if ( !is_front_page() ){
		echo '<ul>';
		echo '<li><a href="'. home_url() .'">HOME</a></li>';
		// ▼投稿ページをブログに指定された場合
		if ( is_404() ){
			echo "<li> &raquo; ページが見つかりません</li>";
		// ▼投稿ページをブログに指定された場合
		} elseif ( is_home() ){
			echo '<li> &raquo; ブログ</li>';
		// ▼お知らせ
		} elseif (get_post_type() == 'info') {
			echo '<li> &raquo; お知らせ</li>';
			if (is_single()) {
			$taxo_catelist = get_the_term_list( $post->ID, 'info-cat', '', ',', '' );
				echo '<li> &raquo; '.$taxo_catelist.'</li>';
				echo '<li> &raquo; '.the_title('','', FALSE).'</li>';
			} else if (is_tax('info-cat')){
				echo '<li> &raquo; '.single_cat_title('','', FALSE).'</li>';
			} else if (is_archive()) {
				echo '<li> &raquo; '.get_the_time('Y').'年</li>';
			}
		// ▼固定ページ
		} elseif ( is_page() ) {
			$post = $wp_query->get_queried_object();
			if ( $post->post_parent == 0 ){
				echo "<li> &raquo; ".the_title('','', FALSE)."</li>";
			} else {
				$title = the_title('','', FALSE);
				$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
				array_push($ancestors, $post->ID);

				foreach ( $ancestors as $ancestor ){
					if( $ancestor != end($ancestors) ){
						echo '<li> &raquo; <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
					} else {
						echo '<li> &raquo; '. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>';
					}
				}
			}
		} else if ( is_category() ) {
			echo '<li> &raquo; ブログ</li>';
			$catTitle = single_cat_title( "", false );
			$cat = get_cat_ID( $catTitle );
			echo "<li> &raquo; ". get_category_parents( $cat, TRUE, "" ) ."</li>";
		} elseif ( is_tag() ) {
			echo '<li> &raquo; ブログ</li>';
			$tagTitle = single_tag_title( "", false );
			echo "<li> &raquo; ". $tagTitle ."</li>";
		} elseif ( is_archive() && !is_category() ) {
			echo '<li> &raquo; ブログ</li>';
			echo "<li> &raquo; ".get_the_date('Y'."年".'M')."</li>";
		} elseif ( is_search() ) {
			echo "<li> &raquo; 検索結果</li>";
		} elseif ( is_attachment() ) {
			echo '<li> &raquo; '.the_title('','', FALSE).'</li>';
		} elseif ( is_single() ) {
			$category = get_the_category();
			$category_id = get_cat_ID( $category[0]->cat_name );
			echo '<li> &raquo; ブログ</li>';
			echo '<li> &raquo; '. get_category_parents( $category_id, TRUE, " &raquo; " );
			echo the_title('','', FALSE) ."</li>";
		echo "</ul>";
		}
	}
}

/*-------------------------------------------*/
/*	カスタム分類でaタグ無しで出力する
/*-------------------------------------------*/
function get_the_term_list_nolink( $id = 0, $taxonomy, $before = '', $sep = '', $after = '' ) {
    $terms = get_the_terms( $id, $taxonomy );
 
    if ( is_wp_error( $terms ) )
        return $terms;
 
    if ( empty( $terms ) )
        return false;
 
    foreach ( $terms as $term ) {
 
        $term_names[] =  $term->name ;
    }
    return $before . join( $sep, $term_names ) . $after;
}
/*-------------------------------------------*/
/*	title 生成
/*-------------------------------------------*/
function getHeadTitle() {
	global $wp_query;
	$post = $wp_query->get_queried_object();
	if (is_home() || is_page('home') || is_front_page()) {
		$headTitle = get_bloginfo('name')." | ".get_bloginfo( 'description' );
	// ▼固定ページ
	} else if (is_page()) {
		// ▼サブページの場合
		if ( $post->post_parent ) {
			if($post->ancestors){
				foreach($post->ancestors as $post_anc_id){
					$post_id = $post_anc_id;
				}
			} else {
				$post_id = $post->ID;
			}
			$headTitle = get_the_title()." | ".get_the_title($post_id)." | ".get_bloginfo('name');
		// ▼サブページではない場合
		} else {
			$headTitle = get_the_title()." | ".get_bloginfo('name');
		}
	// ▼お知らせ
	} else if (get_post_type() === 'info' || taxonomy_exists('info-cat')) { // タクソノミーの指定は投稿が空のタクソノミーページでも正しく読み込む為に必要。
		// ▼お知らせ
		if (is_single()) {
			$taxo_catelist = get_the_term_list_nolink( $post->ID, 'info-cat', '', ',', '' );
			$headTitle = get_the_title()." | ".$taxo_catelist." | ".get_bloginfo('name');
		// ▼お知らせカテゴリー
		} else if (is_tax()){
			$headTitle = single_cat_title()." | お知らせ | ".get_bloginfo('name');
		// ▼お知らせアーカイブ
		} else if (is_archive()) {
			$headTitle = get_the_date('Y')."年 | お知らせ | ".get_bloginfo('name');
		}
	// ▼投稿記事
	} else if (is_single()) {
		$category = get_the_category();
		$headTitle = get_the_title()." | ".$category[0]->cat_name." | ".get_bloginfo('name');
	// ▼投稿カテゴリーページ
	} else if (is_category()) {
		$headTitle = single_cat_title()." | ブログ | ".get_bloginfo('name');
	// ▼タグアーカイブ */
	} else if (is_tag()) {
		$headTitle = single_tag_title()." | ".get_bloginfo('name');
	// ▼投稿アーカイブページ
	} else if (is_archive()) {
		$headTitle = get_the_date('Y'."年".'M')." | ブログ | ".get_bloginfo('name');
	// ▼検索結果
	} else if (is_search()) {
		$headTitle = get_search_query()."の検索結果 | ".get_bloginfo('name');
	// ▼それ以外
	} else {
		$headTitle = get_bloginfo('name');
	}
    echo $headTitle;
}
/*-------------------------------------------*/
/*	description 生成
/*-------------------------------------------*/
function getHeadDescription() {
	global $wp_query;
	$post = $wp_query->get_queried_object();
	// ▼トップページ
	if (is_home() || is_page('home') || is_front_page()) {
		$metadescription = get_bloginfo( 'description' );
	// ▼カテゴリーページ
	} else if (is_category()) {
		$metadescription = $post->category_description;
		if ( ! $metadescription ) {
			$metadescription = single_cat_title()."について。".get_bloginfo('description');
		}
	// ▼タグアーカイブ */
	} else if (is_tag()) {
		$metadescription = strip_tags(tag_description());
		$metadescription = str_replace(array("\r\n","\r","\n"), '', $metadescription);  // 改行コード削除
		if ( ! $metadescription ) {
			$metadescription = single_tag_title()."について。".get_bloginfo('name').get_bloginfo('description');
		}
	// ▼アーカイブ */
	} else if (is_archive()) {
		$metadescription = get_the_time('Y')."年の投稿。".get_bloginfo('name').get_bloginfo('description');
	// ▼固定ページ || 投稿記事
	} else if (is_page() || is_single) {
		$metaExcerpt = $post->post_excerpt;
		if ($metaExcerpt) {
			$metadescription = $post->post_excerpt;
		} else {
			$metadescription = mb_substr( strip_tags($post->post_content), 0, 240 ); // タグを無効化して240文字でトリム
			$metadescription = str_replace(array("\r\n","\r","\n"), ' ', $metadescription);  // 改行コード削除
		}
	// ▼それ以外
	} else {
		$metadescription = get_bloginfo('description');
	}
    echo $metadescription;
}
/*-------------------------------------------*/
/*	keyword 設定
/*-------------------------------------------*/
add_action('admin_menu', 'add_custom_field_1');
add_action('save_post', 'save_custom_field_1');

function add_custom_field_1(){
  if(function_exists('add_custom_field_1')){
    add_meta_box('div1', 'キーワード', 'insert_custom_field_1', 'page', 'normal', 'high');
    add_meta_box('div1', 'キーワード', 'insert_custom_field_1', 'post', 'normal', 'high');
    add_meta_box('div1', 'キーワード', 'insert_custom_field_1', 'info', 'normal', 'high');
  }
}

function insert_custom_field_1(){
  global $post;
  echo '<input type="hidden" name="noncename_custom_field_1" id="noncename_custom_field_1" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />';
  echo '<label class="hidden" for="metaKeyword">キーワード</label><input type="text" name="metaKeyword" size="50" value="'.get_post_meta($post->ID, 'metaKeyword', true).'" />';
  echo '<p>このページで個別に設定するキーワードを , 区切りで入力して下さい（任意）<br />';
  echo '※サイト全体に共通して設定するキーワードは<a href="'.site_url().'/wp-admin/themes.php?page=theme_options#seoSetting" target="_blank">テーマオプション</a>から設定出来ます。</p>';
}

function save_custom_field_1($post_id){
  if(!wp_verify_nonce($_POST['noncename_custom_field_1'], plugin_basename(__FILE__))){
    return $post_id;
  }
  if('page' == $_POST['post_type']){
    if(!current_user_can('edit_page', $post_id)) return $post_id;
  }else{
    if(!current_user_can('edit_post', $post_id)) return $post_id;
  }

  $data = $_POST['metaKeyword'];

  if(get_post_meta($post_id, 'metaKeyword') == ""){
    add_post_meta($post_id, 'metaKeyword', $data, true);
  }elseif($data != get_post_meta($post_id, 'metaKeyword', true)){
    update_post_meta($post_id, 'metaKeyword', $data);
  }elseif($data == ""){
    delete_post_meta($post_id, 'metaKeyword', get_post_meta($post_id, 'metaKeyword', true));
  }
}

/*-------------------------------------------*/
/*	抜粋の後につく [...] を変換
/*-------------------------------------------*/
function change_excerpt_more($post) {
    return ' ...';    
}    
add_filter('excerpt_more', 'change_excerpt_more');

/*-------------------------------------------*/
/*	抜粋のpタグ自動挿入解除
/*-------------------------------------------*/
remove_filter('the_excerpt', 'wpautop');

/*-------------------------------------------*/
/*	年別アーカイブリストの“年”をaタグの中に置換
/*-------------------------------------------*/
function my_archives_link($html){
  return preg_replace('@</a>(.+?)</li>@', '\1</a></li>', $html);
}
add_filter('get_archives_link', 'my_archives_link');

// ▼TinyMCEでGoogleMap (iframeタグの消去禁止指定）
function add_iframe($initArray) {
$initArray['extended_valid_elements'] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
return $initArray;
}
add_filter('tiny_mce_before_init', 'add_iframe');
// ▲TinyMCEでGoogleMap (iframeタグの消去禁止指定

// ▼metaタグからwordpressの情報を削除（旧バージョンの利用がわかるとセキュリティの脆弱性を突かれやすい）
remove_action('wp_head', 'wp_generator');
// ▲metaタグからwordpressの情報を削除

/*-------------------------------------------*/
/*	ナビゲーションメニューの英語併記
/*-------------------------------------------*/
class description_walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $prepend = '<strong>';
        $append = '</strong>';
        $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

        if($depth != 0) {
            $description = $append = $prepend = "";
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
        $item_output .= $description.$args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
/*-------------------------------------------*/
/*	画像挿入時のwidthとheight指定削除
/*	（スマホ表示の際に画像サイズ自動調整がうまくいかない為）
/*-------------------------------------------*/
function remove_hwstring_from_image_tag( $html, $id, $caption, $title, $align, $url, $size ) {
    list( $img_src, $width, $height ) = image_downsize($id, $size);
    $hwstring = image_hwstring( $width, $height );
    $html = str_replace( $hwstring, '', $html );
    return $html;
}
add_filter( 'image_send_to_editor', 'remove_hwstring_from_image_tag', 10, 7 );


/*-------------------------------------------*/
/*	Comment
/*-------------------------------------------*/
if ( ! function_exists( 'biz_vektor_comment' ) ) :
function biz_vektor_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="commentBox">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf(sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em>あなたのコメントは承認待ちです。</em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata">
		<?php printf( '%1$s at %2$s', get_comment_date(),  get_comment_time() ); ?> <?php edit_comment_link( 'Edit', '<span class="edit-link">(', ')</span>' ); ?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>
		<div class="sBtn">
		<?php comment_reply_link( array_merge( $args, array( 'reply_text' => '返信', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p>Pingback: <?php comment_author_link(); ?>  <?php edit_comment_link( 'Edit', '<span class="edit-link">(', ')</span>' ); ?>
	<?php
			break;
	endswitch;
}
endif;

/*-------------------------------------------*/
/*	Archive page link ( don't erase )
/*-------------------------------------------*/
function biz_vektor_content_nav( $nav_id ) {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $nav_id; ?>">
			<h4 class="assistive-text">ナビゲーション</h4>
			<div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> 古い投稿'); ?></div>
			<div class="nav-next"><?php previous_posts_link('新しい投稿 <span class="meta-nav">&rarr;</span>'); ?></div>
		</div><!-- #nav -->
	<?php endif;
} 

/*-------------------------------------------*/
/*	Comment out short code
/*-------------------------------------------*/
/*
本文欄で一時的に非表示にしたい箇所がある場合、
htmlモードで該当箇所を[ignore][/ignore]で囲うと、コメントアウトが出来ます。
*/
function ignore_shortcode( $atts, $content = null ) {
    return null;
}
add_shortcode('ignore', 'ignore_shortcode');