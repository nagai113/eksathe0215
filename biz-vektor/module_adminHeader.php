<?php
// 管理者：10 編集者：7 投稿者：2 寄稿者：1 購読者：0 
global $user_level;
get_currentuserinfo();
if (1 <= $user_level) { ?>
<div id="adminHeaderOuter">
<div id="adminHeaderMenu">
<ul>
<li><a href="<?php echo get_admin_url(); ?>">管理画面</a>
	<ul>
	<li><a href="<?php echo home_url( '/' ); ?>">公開ページを見る</a></li>
	<?php // 管理者のみ
	global $user_level;
	get_currentuserinfo();
	if (10 <= $user_level) { ?>
	<li><a href="<?php echo home_url( '/' ); ?>wp-admin/plugins.php">プラグインの管理</a></li>
	<?php } ?>
	</ul>
</li>
<?php // 管理者のみ
global $user_level;
get_currentuserinfo();
if (10 <= $user_level) { ?>
<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options">テーマの管理</a>
	<ul>
	<li><a href="<?php echo site_url(); ?>/wp-admin/options-general.php">タイトル・キャッチコピー（説明）</a></li>
	<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=custom-header">トップページの大バナー画像</a></li>
	<li><a href="<?php echo site_url(); ?>/wp-admin/options-reading.php">トップページの大バナーの下に表示するページの設定</a></li>
	<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options">テーマオプション</a>
		<ul>
		<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#design">デザインの設定</a></li>
		<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#contactInfo">連絡先の設定</a></li>
		<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#seoSetting">SEOの設定</a></li>
		<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#topPage">トップページの設定</a></li>
		<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#snsSetting">SNS連携の設定</a></li>
		<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#slideSetting">スライドショーの設定</a></li>
		<li><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#galaSetting">携帯（ガラケー）の設定</a></li>
		</ul>
	</li>
	<li><a href="<?php echo site_url(); ?>/wp-admin/nav-menus.php">メニューの設定</a>
		<ul>
		<li><a href="http://bizvektor.com/setting/menu/" target="_blank">メニューの設定方法</a></li>
		</ul>
	</li>
	<li><a href="<?php echo site_url(); ?>/wp-admin/widgets.php">ウィジェット</a></li>
	</ul>
</li>
<?php } ?>
<li><a href="<?php echo site_url(); ?>/wp-admin/edit.php">ブログの管理</a>
	<ul>
	<li><a href="<?php echo site_url(); ?>/wp-admin/edit.php">ブログ記事一覧</a></li>
	<li><a href="<?php echo site_url(); ?>/wp-admin/post-new.php">ブログの投稿</a></li>
	<?php // 編集者以上
	global $user_level;
	get_currentuserinfo();
	if (7 <= $user_level) { ?>
	<li><a href="<?php echo site_url(); ?>/wp-admin/edit-tags.php?taxonomy=category">ブログのカテゴリー</a></li>
	<?php } ?>
	</ul>
</li>
<li><a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=info">お知らせの管理</a>
	<ul>
	<li><a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=info">お知らせ一覧</a></li>
	<li><a href="<?php echo site_url(); ?>/wp-admin/post-new.php?post_type=info">お知らせの投稿</a></li>
	<?php // 編集者以上
	global $user_level;
	get_currentuserinfo();
	if (7 <= $user_level) { ?>
	<li><a href="<?php echo site_url(); ?>/wp-admin/edit-tags.php?taxonomy=info-cat">お知らせのカテゴリー</a></li>
	<?php } ?>
	</ul>
</li>
<?php // 編集者以上
global $user_level;
get_currentuserinfo();
if (7 <= $user_level) { ?>
<li><a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=page">ページの管理</a>
	<ul>
	<li><a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=page">ページ一覧</a>
	<li><a href="<?php echo site_url(); ?>/wp-admin/post-new.php?post_type=page">ページの追加</a></li>
	<li><a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=page&page=mypageorder">ページの並び替え<br />（プラグイン「My Page Order」）</a></li>
	</ul>
</li>
<?php } ?>
<li><?php wp_loginout(); ?></li>
</ul>
</div>
</div>
<?php } ?>