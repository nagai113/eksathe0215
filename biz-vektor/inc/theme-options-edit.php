<?php 
function biz_vektor_theme_options_render_page() { ?>
	<div class="wrap" id="biz_vektor_options">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', '' ), get_current_theme() ); ?></h2>
		<?php settings_errors(); ?>
		
		<?php if ( function_exists( 'biz_vektor_activation' ) ) {
		biz_vektor_activation_information();
		} else { ?>
		<iframe style="width: 100%; border:1px solid #ccc;margin:20px 0px 20px; height: 200px;" frameborder="0" height="200" marginheight="0" marginwidth="0" scrolling="auto" src="http://bizvektor.com/info-admin/"></iframe>
		<?php } ?>
		<ul>
		<li><a href="#design">デザインの設定</a></li>
		<li><a href="#contactInfo">連絡先の設定</a></li>
		<li><a href="#seoSetting">SEOの設定</a></li>
		<li><a href="#topPage">トップページの設定</a></li>
		<li><a href="#snsSetting">SNS連携の設定</a></li>
		<li><a href="#slideSetting">スライドショーの設定</a></li>
		<li><a href="#galaSetting">携帯（ガラケー）の設定</a></li>
		</ul>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'biz_vektor_options' );
				$options = biz_vektor_get_theme_options();
				$default_options = biz_vektor_get_default_theme_options();
			?>
<div id="design" class="sectionBox">
<h3>デザインの設定</h3>
<table class="form-table">
<tr>
<th>テーマ</th>
<td>
<select name="biz_vektor_theme_options[theme_style]" id="<?php echo esc_attr( $options['theme_style'] ); ?>">
<option>[ 選択して下さい ]</option>
<?php
// biz_vektor_theme_styles配列読み込み
global $biz_vektor_theme_styles;
biz_vektor_theme_styleSetting();
// プルダウン項目生成
foreach( $biz_vektor_theme_styles as $biz_vektor_theme_styleKey => $biz_vektor_theme_styleValues) {
		if ( $biz_vektor_theme_styleKey == $options['theme_style'] ) {
			print ('<option value="'.$biz_vektor_theme_styleKey.'" selected>'.$biz_vektor_theme_styleValues['label'].'</option>');
		} else {
			print ('<option value="'.$biz_vektor_theme_styleKey.'">'.$biz_vektor_theme_styleValues['label'].'</option>');
		}
}
?>
</select>
<!-- 選択されているスタイルシートのパスをDBに格納 -->
<!--
<input name="biz_vektor_theme_options[theme_stylePath]" id="theme_stylePath" value="<?php echo esc_attr( $biz_vektor_theme_styles[$options['theme_style']]['path']); ?>" style="width:90%;" />
-->
</td>
</tr>
<tr>
<th>ヘッダーメニューの数</th>
<td>
<select name="biz_vektor_theme_options[gMenuDivide]" id="<?php echo esc_attr( $options['gMenuDivide'] ); ?>">
<option>[ 選択して下さい ]</option>
<?php
$biz_vektor_gMenuDivides = array('divide_natural' => '指定なし（左詰め）','divide_4' => '4分割','divide_5' => '5分割','divide_6' => '6分割','divide_7' => '7分割');
foreach( $biz_vektor_gMenuDivides as $biz_vektor_gMenuDivideKey => $biz_vektor_gMenuDivideValue) {
	if ( $biz_vektor_gMenuDivideKey == $options['gMenuDivide'] ) {
		print ('<option value="'.$biz_vektor_gMenuDivideKey.'" selected>'.$biz_vektor_gMenuDivideValue.'</option>');
	} else {
		print ('<option value="'.$biz_vektor_gMenuDivideKey.'">'.$biz_vektor_gMenuDivideValue.'</option>');
	}
}
?>
</select>
[ <a href="http://bizvektor.com/setting/menu/" target="_blank">→ メニューの設定方法</a> ]
</td>
</tr>
<tr valign="top"><th scope="row">ヘッダーロゴ画像URL</th>
<td>ロゴ画像をアップロードした後、ファイルのURLを下記に貼り付けて下さい。<br />
画像サイズは高さ50px以下推奨です。50pxより大きい場合は自動的に50pxに縮小します。<br />
[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">→ ロゴ画像をアップロードする</a> ] <br />

<!-- upテスト
<a id="content-add_media" class="thickbox add_media" onclick="return false;" title="メディアを追加" href="media-upload.php?themes.php?page=theme_options&TB_iframe=1&width=640&height=439">
<img height="15" width="15" src="http://www.vektor-inc.co.jp/wp/wp-admin/images/media-button.png?ver=20111005">
</a>

<a id="add_media_head_logo" class="thickbox add_media" href="media-upload.php?TB_iframe=true" title='メディアを追加' onclick="focusTextField('head_logo'); jQuery(this).attr('href',jQuery(this).attr('href').replace('\?','?themes.php?page=theme_options'.val())); return thickbox(this);">
<img src='images/media-button.png' alt='メディアを追加' /></a>
<textarea id="worksmainimage93306255" name="worksmainimage[1][]" rows="5" cols="50" class=""></textarea>
<input type="hidden" name="worksmainimage_rand[1]" value="93306255" />
-->

<fieldset>
<input type="text" name="biz_vektor_theme_options[head_logo]" id="head_logo" value="<?php echo esc_attr( $options['head_logo'] ); ?>" style="width:100%;" /><br />
</fieldset>
【記入例】http://www.vektor-inc.co.jp/images/logo.png<br />

</td>
</tr>
<tr valign="top" class="image-radio-option theme-layout"><th scope="row">レイアウト</th>
<td>
<fieldset>
<?php
	foreach ( biz_vektor_layouts() as $layout ) {
		?>
		<div class="layout">
		<label class="description">
			<input type="radio" name="biz_vektor_theme_options[theme_layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['theme_layout'], $layout['value'] ); ?> />
			<span>
				<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />
				<?php echo $layout['label']; ?>
			</span>
		</label>
		</div>
		<?php
	}
?>
</fieldset>
</td>
</tr>
</table>
<?php submit_button(); ?>
<?php
/*-------------------------------------------*/
/*	入力_お知らせ」と「ブログ」の表示設定
/*-------------------------------------------*/
?>
<h3>「お知らせ」と「ブログ」の設定</h3>
<table class="form-table">
<tr>
<th>「お知らせ」と「ブログ」の一覧表示設定</th>
<td>
※「お知らせ」「ブログ」共に投稿が１件もない場合は表示されません。
<h4>お知らせ</h4>
<dl>
<dt>トップページでのお知らせの表示レイアウト</dt>
<dd>
<?php
$biz_vektor_listTypes = array('listType_title' => 'タイトルのみ','listType_set' => '抜粋・画像あり');
foreach( $biz_vektor_listTypes as $biz_vektor_listTypeValue => $biz_vektor_listTypeLavel) {
	if ( $biz_vektor_listTypeValue == $options['listInfoTop'] ) { ?>
	<label><input type="radio" name="biz_vektor_theme_options[listInfoTop]" value="<?php echo $biz_vektor_listTypeValue ?>" checked> <?php echo $biz_vektor_listTypeLavel ?></label> 
	<?php } else { ?>
	<label><input type="radio" name="biz_vektor_theme_options[listInfoTop]" value="<?php echo $biz_vektor_listTypeValue ?>"> <?php echo $biz_vektor_listTypeLavel ?></label> 
	<?php }
} 
?>
</dd>
<dt>アーカイブページでのお知らせの表示レイアウト</dt>
<dd>
<?php
$biz_vektor_listTypes = array('listType_title' => 'タイトルのみ','listType_set' => '抜粋・画像あり');
foreach( $biz_vektor_listTypes as $biz_vektor_listTypeValue => $biz_vektor_listTypeLavel) {
	if ( $biz_vektor_listTypeValue == $options['listInfoArchive'] ) { ?>
	<label><input type="radio" name="biz_vektor_theme_options[listInfoArchive]" value="<?php echo $biz_vektor_listTypeValue ?>" checked> <?php echo $biz_vektor_listTypeLavel ?></label> 
	<?php } else { ?>
	<label><input type="radio" name="biz_vektor_theme_options[listInfoArchive]" value="<?php echo $biz_vektor_listTypeValue ?>"> <?php echo $biz_vektor_listTypeLavel ?></label> 
	<?php }
} 
?>
</dd>
</dl>

<h4>ブログ</h4>
<dl>
<dt>トップページでのブログの表示</dt>
<dd>
<?php
$biz_vektor_listTypes = array('listType_title' => 'タイトルのみ','listType_set' => '抜粋・画像あり');
foreach( $biz_vektor_listTypes as $biz_vektor_listTypeValue => $biz_vektor_listTypeLavel) {
	if ( $biz_vektor_listTypeValue == $options['listBlogTop'] ) { ?>
	<label><input type="radio" name="biz_vektor_theme_options[listBlogTop]" value="<?php echo $biz_vektor_listTypeValue ?>" checked> <?php echo $biz_vektor_listTypeLavel ?></label> 
	<?php } else { ?>
	<label><input type="radio" name="biz_vektor_theme_options[listBlogTop]" value="<?php echo $biz_vektor_listTypeValue ?>"> <?php echo $biz_vektor_listTypeLavel ?></label> 
	<?php }
} 
?>
</dd>
<dt>アーカイブページでのブログの表示</dt>
<dd>
<?php
$biz_vektor_listTypes = array('listType_title' => 'タイトルのみ','listType_set' => '抜粋・画像あり');
foreach( $biz_vektor_listTypes as $biz_vektor_listTypeValue => $biz_vektor_listTypeLavel) {
	if ( $biz_vektor_listTypeValue == $options['listBlogArchive'] ) { ?>
	<label><input type="radio" name="biz_vektor_theme_options[listBlogArchive]" value="<?php echo $biz_vektor_listTypeValue ?>" checked> <?php echo $biz_vektor_listTypeLavel ?></label> 
	<?php } else { ?>
	<label><input type="radio" name="biz_vektor_theme_options[listBlogArchive]" value="<?php echo $biz_vektor_listTypeValue ?>"> <?php echo $biz_vektor_listTypeLavel ?></label> 
	<?php }
} 
?>
</dd>
</dl>

</table>
<?php submit_button(); ?>
</div>
<!-- [ /#design ] -->

<div id="contactInfo" class="sectionBox">
<h3>連絡先の設定</h3>
<table class="form-table">
<tr valign="top"><th scope="row">お問い合わせのメッセージ</th>
<td>
	<fieldset>
		<input type="text" name="biz_vektor_theme_options[contact_txt]" id="contact_txt" value="<?php echo esc_attr( $options['contact_txt'] ); ?>" />
		<span>【記入例】お気軽にお問い合わせください。</span>
	</fieldset>
</td>
</tr>
<tr valign="top"><th scope="row">お問い合わせ先の電話番号</th>
<td>
	<fieldset>
		<input type="text" name="biz_vektor_theme_options[tel_number]" id="tel_number" value="<?php echo esc_attr( $options['tel_number'] ); ?>" />
		<span>【記入例】000-000-0000</span>
	</fieldset>
</td>
</tr>
<tr valign="top"><th scope="row">電話受付時間</th>
<td>
	<fieldset>
		<input type="text" name="biz_vektor_theme_options[contact_time]" id="contact_time" value="<?php echo esc_attr( $options['contact_time'] ); ?>" />
		<span>【記入例】受付時間 9：00～18：00（土・日・祝日除く）</span>
	</fieldset>
</td>
</tr>
<tr valign="top"><th scope="row">
フッター左下とフッターコピーライトに表示させるサイト名 あるいは企業名・店舗名・サービス名<br />
※SEO対策の為にサイト名が長くなってしまった場合に使用します。</th>
<td>
<fieldset>
<textarea cols="20" rows="2" name="biz_vektor_theme_options[sub_sitename]" id="sub_sitename" value="" /><?php echo esc_attr( $options['sub_sitename'] ); ?></textarea>
<br />
<span>【記入例】BizVektor株式会社</span><br />
※未記入の場合は<a href="<?php echo site_url(); ?>/wp-admin/options-general.php" target="_blank">サイトのタイトル</a>が表示されます。
</fieldset>
</td>
</tr>
<tr valign="top"><th scope="row">住所・電話番号など<br />※フッター左下に表示されます</th>
<td>
	<fieldset>
	<textarea cols="20" rows="5" name="biz_vektor_theme_options[contact_address]" id="contact_address" value="" /><?php echo esc_attr( $options['contact_address'] ); ?></textarea>
	<br />
	<span>【記入例】<br />
	〒000-000<br />
	愛知県あま市○○○丁目○○番地<br />
	TEL : 000-000-0000 / FAX : 000-000-0000
	</span>
	</fieldset>
</td>
</tr>
<tr valign="top"><th scope="row">問い合わせページのURL</th>
<td>
	<fieldset>
		<input type="text" name="biz_vektor_theme_options[contact_link]" id="contact_link" value="<?php echo esc_attr( $options['contact_link'] ); ?>" />
		<span>【記入例】http://www.********.co.jp/contact/ あるいは /******/</span>
	</fieldset>
</td>
</tr>
</table>
<?php submit_button(); ?>
</div>
<!-- [ /#contactInfo ] -->

<div id="seoSetting" class="sectionBox">
<h3>SEO設定</h3>
<table class="form-table">
<tr>
<th>共通キーワード</th>
<td><fieldset>metaタグのキーワードで、サイト全体で共通して入れるキーワードを , 区切りで入力して下さい。<br />
<input type="text" name="biz_vektor_theme_options[commonKeyWords]" id="commonKeyWords" value="<?php echo esc_attr( $options['commonKeyWords'] ); ?>" style="width:90%;" /><br />
※各ページ個別のキーワードについては、それぞれの記事の管理画面より入力して下さい。合計で最大10個程度が望ましいです。<br />
※最後のキーワード欄の末尾には , は必要ありません。<br />
【記入例】WordPress,テンプレート,無料,GPL
</fieldset>

<p>※各ページの管理画面の「抜粋」欄に記入した内容がmetaタグのディスクリプションに反映されます。</p>
</td>
</tr>
<tr>
<th>Google Analytics設定</th>
<td><fieldset>GoogleAnalyticsのタグを埋め込む場合はアカウントIDを記入して下さい。<br />
UA-<input type="text" name="biz_vektor_theme_options[gaID]" id="gaID" value="<?php echo esc_attr( $options['gaID'] ); ?>" style="width:90%;" /><br />
【記入例】XXXXXXXX-X
</fieldset>
</td>
</tr>
</table>
<?php submit_button(); ?>
</div>
<!-- [ /#seoSetting ] -->


<div id="topPage" class="sectionBox">
<h3>トップページの設定</h3>
※全て空欄の場合トップページにPRブロックは表示されません。
<table class="form-table" id="topPr">
<tr>
<th scope="row">PRエリア1</th>
<th scope="row">PRエリア2</th>
<th scope="row">PRエリア3</th>
</tr>
<tr>
<td>
<dl>
<dt>タイトル</dt>
<dd><fieldset>
<input type="text" name="biz_vektor_theme_options[pr1_title]" id="pr1_title" value="<?php echo esc_attr( $options['pr1_title'] ); ?>" />
</fieldset></dd>
<dt>概要</dt>
<dd><fieldset>
<textarea cols="15" rows="3" name="biz_vektor_theme_options[pr1_description]" id="pr1_description" value=""><?php echo esc_attr( $options['pr1_description'] ); ?></textarea>
</fieldset></dd>
<dt>リンク先ページのURL</dt>
<dd><fieldset>
<input type="text" name="biz_vektor_theme_options[pr1_link]" id="pr1_link" value="<?php echo esc_attr( $options['pr1_link'] ); ?>" />
</fieldset></dd>
</dl>
</td>
<td>
<dl>
<dt>タイトル</dt>
<dd><fieldset>
<input type="text" name="biz_vektor_theme_options[pr2_title]" id="pr1_title" value="<?php echo esc_attr( $options['pr2_title'] ); ?>" />
</fieldset></dd>
<dt>概要</dt>
<dd><fieldset>
<textarea cols="15" rows="3" name="biz_vektor_theme_options[pr2_description]" id="pr2_description" value=""><?php echo esc_attr( $options['pr2_description'] ); ?></textarea>
</fieldset></dd>
<dt>リンク先ページのURL</dt>
<dd><fieldset>
<input type="text" name="biz_vektor_theme_options[pr2_link]" id="pr1_link" value="<?php echo esc_attr( $options['pr2_link'] ); ?>" />
</fieldset></dd>
</dl>
</td>
<td>
<dl>
<dt>タイトル</dt>
<dd><fieldset>
<input type="text" name="biz_vektor_theme_options[pr3_title]" id="pr1_title" value="<?php echo esc_attr( $options['pr3_title'] ); ?>" />
</fieldset></dd>
<dt>概要</dt>
<dd><fieldset>
<textarea cols="15" rows="3" name="biz_vektor_theme_options[pr3_description]" id="pr3_description" value=""><?php echo esc_attr( $options['pr3_description'] ); ?></textarea>
</fieldset></dd>
<dt>リンク先ページのURL</dt>
<dd><fieldset>
<input type="text" name="biz_vektor_theme_options[pr3_link]" id="pr1_link" value="<?php echo esc_attr( $options['pr3_link'] ); ?>" />
</fieldset></dd>
</dl>
</td>
</tr>
</table>
<table class="form-table">
<tr>
<th>ブログRSS</th>
<td>外部ブログを利用していて、更新情報をこのサイトに掲載する場合はRSSのアドレスを入力して下さい。<br />
<input type="text" name="biz_vektor_theme_options[blogRss]" id="blogRss" value="<?php echo esc_attr( $options['blogRss'] ); ?>" />
<span>【記入例】http://www.XXXX.jp/?feed=rss2</span>
</td>
</tr>
<tr>
<th>トップページ下部フリーエリア</th>
<td>「お知らせ」や「ブログ」のリストの下の部分に表示されます。<br />
<textarea cols="50" rows="4" name="biz_vektor_theme_options[topContentsBottom]" id="topContentsBottom" value="" style="width:90%;"><?php echo esc_attr( $options['topContentsBottom'] ); ?></textarea>
</td>
</tr>
</table>
<?php submit_button(); ?>
</div>

<?php
/*-------------------------------------------*/
/*	入力_SNS連携
/*-------------------------------------------*/
?>
<div id="snsSetting" class="sectionBox">
<h3>SNS連携</h3>
よくわからない場合は後で設定しても問題ありません。
<table class="form-table">
<tr>
<th>facebook</th>
<td>facebookページか個人アカウントにリンクする場合はリンク先アドレスを入力するとバナーが表示されます。<br />
<input type="text" name="biz_vektor_theme_options[facebook]" id="facebook" value="<?php echo esc_attr( $options['facebook'] ); ?>" />
<span>【記入例】https://www.facebook.com/hidekazu.ishikawa</span><br />
※facebookが発行するバナー・ウィジェットを利用したい場合は、空欄のままにして、<a href="<?php echo site_url(); ?>/wp-admin/widgets.php" target="_blank">ウィジェット</a>より『テキスト』を利用してソースコードを貼り付けて下さい。
</td>
</tr>
<tr>
<th>facebookアプリケーションID</th>
<td><input type="text" name="biz_vektor_theme_options[fbAppId]" id="fbAppId" value="<?php echo esc_attr( $options['fbAppId'] ); ?>" />
<span>[ <a href="https://developers.facebook.com/apps" target="_blank">→アプリケーションIDを確認・取得する</a> ]</span><br />
※アプリケーションIDを入力しないとボタンやコメント欄が表示・正しく動作しません。
facebookのアプリケーションIDの取得方法についてよくわからない場合は「facebook アプリケーションID 取得」などで検索して下さい。
</td>
</tr>
<tr>
<th>facebookユーザーID （任意）</th>
<td>管理者のfacebookユーザーIDを入力して下さい。<br />
<input type="text" name="biz_vektor_theme_options[fbAdminId]" id="fbAdminId" value="<?php echo esc_attr( $options['fbAdminId'] ); ?>" /><br />
※facebookページのアプリケーションIDではありません。<br />
facebookの個人IDは、自分のタイムラインでアイコン写真をクリックするとURLにfbid=XXXXXXXX という記述がありますので、その部分がユーザーIDです。それでもよくわからない場合は「facebook ユーザーID 調べ方」などで検索して下さい。
</td>
</tr>
<tr>
<th>twitterアカウント</th>
<td>twitterにリンクする場合はリンク先アドレスを入力するとバナーが表示されます。<br />
@<input type="text" name="biz_vektor_theme_options[twitter]" id="twitter" value="<?php echo esc_attr( $options['twitter'] ); ?>" /><br />
※twitterのウィジェットなどを利用したい場合は空欄のままにして、<a href="<?php echo site_url(); ?>/wp-admin/widgets.php" target="_blank">ウィジェット</a>より『テキスト』を利用してソースコードを貼り付けて下さい。
</td>
</tr>
<tr>
<th>デフォルトのOGPイメージ</th>
<td>facebookの「いいね」ボタンを押された場合などに、facebookのタイムラインに表示される画像です。<br />
ページにアイキャッチ画像が指定されてる場合はそちらが優先されます。<br />
画像サイズは50×50ピクセル以上、画像比率3:1以下、150×150ピクセル推奨。<br />
[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">→ OGP画像をアップロードする</a> ] ※アップロードした後、ファイルのURLを下記に貼り付けて下さい。<br />
<input type="text" name="biz_vektor_theme_options[ogpImage]" id="ogpImage" value="<?php echo esc_attr( $options['ogpImage'] ); ?>" /><br />
<span>【記入例】http://www.vektor-inc.co.jp/images/ogpImage.png</span>
</td>
</tr>
<tr>
<th>ソーシャルボタン</th>
<td>
ソーシャルボタンを表示するページの種類にチェックを入れて下さい。
<ul>
<li><input type="checkbox" name="biz_vektor_theme_options[snsBtnsFront]" id="snsBtnsFront" value="false" <?php if ($options['snsBtnsFront']) {?> checked<?php } ?>> トップページ</li>
<li><input type="checkbox" name="biz_vektor_theme_options[snsBtnsPage]" id="snsBtnsPage" value="false" <?php if ($options['snsBtnsPage']) {?> checked<?php } ?>> 固定ページ</li>
<li><input type="checkbox" name="biz_vektor_theme_options[snsBtnsPost]" id="snsBtnsPost" value="false" <?php if ($options['snsBtnsPost']) {?> checked<?php } ?>> ブログ投稿ページ</li>
<li><input type="checkbox" name="biz_vektor_theme_options[snsBtnsInfo]" id="snsBtnsInfo" value="false" <?php if ($options['snsBtnsInfo']) {?> checked<?php } ?>> お知らせ投稿ページ</li>
</ul>
チェックを入れたページの種類でも表示したくないページがある場合はIDを , 区切りで入力して下さい。<br />
<input type="text" name="biz_vektor_theme_options[snsBtnsHidden]" id="ogpImage" value="<?php echo esc_attr( $options['snsBtnsHidden'] ); ?>" /><br />
【記入例】1,3,7
</td>
</tr>
<tr>
<th>facebook コメント欄</th>
<td>
facebookコメント欄を表示するページにはチェックを入れて下さい。
<ul>
<li><input type="checkbox" name="biz_vektor_theme_options[fbCommentsFront]" id="fbCommentsFront" value="false" <?php if ($options['fbCommentsFront']) {?> checked<?php } ?>> トップページ</li>
<li><input type="checkbox" name="biz_vektor_theme_options[fbCommentsPage]" id="fbCommentsPage" value="false" <?php if ($options['fbCommentsPage']) {?> checked<?php } ?>> 固定ページ</li>
<li><input type="checkbox" name="biz_vektor_theme_options[fbCommentsPost]" id="fbCommentsPost" value="false" <?php if ($options['fbCommentsPost']) {?> checked<?php } ?>> ブログ投稿ページ</li>
<li><input type="checkbox" name="biz_vektor_theme_options[fbCommentsInfo]" id="fbCommentsInfo" value="false" <?php if ($options['fbCommentsInfo']) {?> checked<?php } ?>> お知らせ投稿ページ</li>
</ul>
チェックを入れたページの種類でも表示したくないページがある場合はIDを , 区切りで入力して下さい。<br />
<input type="text" name="biz_vektor_theme_options[fbCommentsHidden]" id="ogpImage" value="<?php echo esc_attr( $options['fbCommentsHidden'] ); ?>" /><br />
【記入例】1,3,7
</td>
</tr>
<tr>
<th>facebook LikeBox</th>
<td>
facebook LikeBox を設置する場合は設置個所にチェックを入れて下さい。
<ul>
<li><input type="checkbox" name="biz_vektor_theme_options[fbLikeBoxFront]" id="fbLikeBoxFront" value="false" <?php if ($options['fbLikeBoxFront']) {?> checked<?php } ?>> トップページ</li>
<li><input type="checkbox" name="biz_vektor_theme_options[fbLikeBoxSide]" id="fbLikeBoxSide" value="false" <?php if ($options['fbLikeBoxSide']) {?> checked<?php } ?>> サイドバー</li>
</ul>
<dl>
<dt>facebookページのURL</dt>
<dd><input type="text" name="biz_vektor_theme_options[fbLikeBoxURL]" id="fbLikeBoxURL" value="<?php echo esc_attr( $options['fbLikeBoxURL'] ); ?>" />
<span>【記入例】https://www.facebook.com/bizvektor</span></dd>
<dt>ストリームの表示</dt>
<dd><input type="checkbox" name="biz_vektor_theme_options[fbLikeBoxStream]" id="fbLikeBoxStream" value="false" <?php if ($options['fbLikeBoxStream']) {?> checked<?php } ?>> 表示する</dd>
<dt>顔の表示</dt>
<dd><input type="checkbox" name="biz_vektor_theme_options[fbLikeBoxFace]" id="fbLikeBoxFace" value="false" <?php if ($options['fbLikeBoxFace']) {?> checked<?php } ?>> 表示する</dd>
<dt>LikeBoxの高さ</dt>
<dd><input type="text" name="biz_vektor_theme_options[fbLikeBoxHeight]" id="fbLikeBoxHeight" value="<?php echo esc_attr( $options['fbLikeBoxHeight'] ); ?>" />
<span>単位：ピクセル</span></dd>
</dl>
</td>
</tr>
<tr>
<th>mixiイイネ！ボタン</th>
<td>識別キー <input type="text" name="biz_vektor_theme_options[mixiKey]" id="twitter" value="<?php echo esc_attr( $options['mixiKey'] ); ?>" /><br />
mixiイイネ！ボタンを利用するためには「mixi Platform 利用登録」が必要となります。<br />
詳しくは「<a href="https://developer.mixi.co.jp/about-platform/overview/" target="_blank">mixi Platform 利用登録の概要</a>」をご覧ください。<br />
識別キー は mixiの「<a href="https://sap.mixi.jp/home.pl" target="_blank">Partner Dashboard</a>」より、<br />
Partner Dashboard　＞　mixi Plugin　 ＞　新規サービス追加　<br />
にて、イイネ！ボタンを設置するサービスの登録を行ってください。<br />
（新規サービスの登録、管理の詳細は<a href="https://developer.mixi.co.jp/connect/mixi_plugin/mixi_check/mixicheck/" target="_blank">こちら</a>）
</td>
</tr>
</table>
<?php submit_button(); ?>
</div>

<div id="slideSetting" class="sectionBox">
<h3>スライドショーの設定</h3>
<p>スライドショーを設定する場合は表示する画像のURLなどを入力下さい。<br />
画像の推奨サイズは950×250pxです。<br />
スライドショーが設定されていない場合は<a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=custom-header">トップページの大バナー画像</a>が表示されます。<br />
画像のURLだけでも構いませんがリンク先を入力すると画像クリックでリンクするようになります。<br />
代替テキストはその画像の内容を文字で入力して下さい。記入した方がその内容で検索にヒットしやすくなると共に、目の不自由な人が閲覧した際には音声読み上げブラウザがその文字を読み上げます。<br />
スライドショーは最大５枚まで設定出来ますが、3G回線のスマートフォンなど通信回線が遅い環境で閲覧した場合、表示に時間がかったり、ユーザーの離脱や検索エンジンからの減点対象となる為、３枚以内推奨です。</p>
<p>[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">→ 画像をアップロードする</a> ]</p>
<table>
<tr>
<td>リンク1 URL<input type="text" name="biz_vektor_theme_options[slide1link]" id="slide1link" value="<?php echo esc_attr( $options['slide1link'] ); ?>" /></td>
<td>画像1 URL<input type="text" name="biz_vektor_theme_options[slide1image]" id="slide1link" value="<?php echo esc_attr( $options['slide1image'] ); ?>" /></td>
<td>代替テキスト1（alt）<input type="text" name="biz_vektor_theme_options[slide1alt]" id="slide1alt" value="<?php echo esc_attr( $options['slide1alt'] ); ?>" /></td>
</tr>
<tr>
<td>リンク2 URL<input type="text" name="biz_vektor_theme_options[slide2link]" id="slide2link" value="<?php echo esc_attr( $options['slide2link'] ); ?>" /></td>
<td>画像2 URL<input type="text" name="biz_vektor_theme_options[slide2image]" id="slide2link" value="<?php echo esc_attr( $options['slide2image'] ); ?>" /></td>
<td>代替テキスト2（alt）<input type="text" name="biz_vektor_theme_options[slide2alt]" id="slide2alt" value="<?php echo esc_attr( $options['slide2alt'] ); ?>" /></td>
</tr>
<tr>
<td>リンク3 URL<input type="text" name="biz_vektor_theme_options[slide3link]" id="slide3link" value="<?php echo esc_attr( $options['slide3link'] ); ?>" /></td>
<td>画像3 URL<input type="text" name="biz_vektor_theme_options[slide3image]" id="slide3link" value="<?php echo esc_attr( $options['slide3image'] ); ?>" /></td>
<td>代替テキスト3（alt）<input type="text" name="biz_vektor_theme_options[slide3alt]" id="slide3alt" value="<?php echo esc_attr( $options['slide3alt'] ); ?>" /></td>
</tr>
<tr>
<td>リンク4 URL<input type="text" name="biz_vektor_theme_options[slide4link]" id="slide4link" value="<?php echo esc_attr( $options['slide4link'] ); ?>" /></td>
<td>画像4 URL<input type="text" name="biz_vektor_theme_options[slide4image]" id="slide4link" value="<?php echo esc_attr( $options['slide4image'] ); ?>" /></td>
<td>代替テキスト4（alt）<input type="text" name="biz_vektor_theme_options[slide4alt]" id="slide4alt" value="<?php echo esc_attr( $options['slide4alt'] ); ?>" /></td>
</tr>
<tr>
<td>リンク5 URL<input type="text" name="biz_vektor_theme_options[slide5link]" id="slide5link" value="<?php echo esc_attr( $options['slide5link'] ); ?>" /></td>
<td>画像5 URL<input type="text" name="biz_vektor_theme_options[slide5image]" id="slide5link" value="<?php echo esc_attr( $options['slide5image'] ); ?>" /></td>
<td>代替テキスト5（alt）<input type="text" name="biz_vektor_theme_options[slide5alt]" id="slide5alt" value="<?php echo esc_attr( $options['slide5alt'] ); ?>" /></td>
</tr>
</table>
<?php submit_button(); ?>
</div>

<div id="galaSetting" class="sectionBox">
<h3>携帯（ガラケー）設定</h3>
<p>携帯へ対応させるには携帯対応プラグイン「<a href="https://wordpress.org/extend/plugins/ktai-style/" target="_blank">Ktai Style</a>」のインストール・有効化と<a href="https://wordpress.org/extend/plugins/ktai-style/" target="_blank">Ktai Style</a>用テーマ「<a href="http://bizvektor.com/download/" target="_blank">BizVektor for Gala-K</a>」のインストールが必要です。</p>
<p>[ <a href="http://bizvektor.com/setting/gala-k/" target="_blank">→ 設定方法</a> ]</p>
<p>[ <a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=ktai_style_theme/" target="_blank">→ 「BizVektor for Gala-K」はこちらから有効化して下さい。</a> ]</p>
<table class="form-table">
<tr valign="top"><th scope="row">携帯用ヘッダー画像<br />
（ロゴあるいはイメージなど）URL</th>
<td>ロゴ画像をアップロードした後、ファイルのURLを下記に貼り付けて下さい。<br />
※横幅240px程度推奨。<br />
※画像は<span style="color:#e50000;">JPEG形式</span>でアップロードして下さい。<br />
※画像サイズは小さくとどめて下さい。<span style="color:#e50000;">大きなサイズをアップするとパケット定額サービスに入っていないユーザーが閲覧した場合に高額なパケット代が請求されます。</span><br />
[ <a href="<?php echo site_url(); ?>/wp-admin/media-new.php" target="_blank">→ ロゴ画像をアップロードする</a> ] <br />
<fieldset>
<input type="text" name="biz_vektor_theme_options[galaLogo]" id="head_logo" value="<?php echo esc_attr( $options['galaLogo'] ); ?>" style="width:100%;" /><br />
</fieldset>
【記入例】http://www.vektor-inc.co.jp/images/galaLogo.jpg<br />
</td>
</tr>
<tr>
<th>携帯テーマカラー</th>
<td>
<select name="biz_vektor_theme_options[galaTheme_style]" id="<?php echo esc_attr( $options['galaTheme_style'] ); ?>">
<option>[ 選択して下さい ]</option>
<?php
$biz_vektor_galaTheme_styles = array(
	'plain' => 'プレーン',
	'001_red' => '赤',
	'001_bizblue' => '紺（青）',
	'001_green' => '緑',
	'001_daidai' => '橙',
);
foreach( $biz_vektor_galaTheme_styles as $biz_vektor_galaTheme_styleKey => $biz_vektor_galaTheme_styleValue) {
	if ( $biz_vektor_galaTheme_styleKey == $options['galaTheme_style'] ) {
		print ('<option value="'.$biz_vektor_galaTheme_styleKey.'" selected>'.$biz_vektor_galaTheme_styleValue.'</option>');
	} else {
		print ('<option value="'.$biz_vektor_galaTheme_styleKey.'">'.$biz_vektor_galaTheme_styleValue.'</option>');
	}
}
?>
</select>
</td>
</tr>
</table>
<?php submit_button(); ?>
</div>
</form>
<p><a href="http://jp.fotolia.com/partner/202810982">
<img src="http://s.ftcdn.net/v2010/pics/jp/banners/static/728x90.jpg" width="728" height="90" alt="Fotolia" />
</a></p>
</div><!-- [ /#biz_vektor_options ] -->
<?php
}

function biz_vektor_theme_options_validate( $input ) {
	$output = $defaults = biz_vektor_get_default_theme_options();

	// テーマカラー
	$output['theme_style'] = $input['theme_style'];

	// gMenuの数
	$output['gMenuDivide'] = $input['gMenuDivide'];
	// ヘッダーロゴ
	$output['head_logo'] = $input['head_logo'];

	// スライド用
	$output['slide1link'] = $input['slide1link'];
	$output['slide1image'] = $input['slide1image'];
	$output['slide1alt'] = $input['slide1alt'];

	$output['slide2link'] = $input['slide2link'];
	$output['slide2image'] = $input['slide2image'];
	$output['slide2alt'] = $input['slide2alt'];

	$output['slide3link'] = $input['slide3link'];
	$output['slide3image'] = $input['slide3image'];
	$output['slide3alt'] = $input['slide3alt'];

	$output['slide4link'] = $input['slide4link'];
	$output['slide4image'] = $input['slide4image'];
	$output['slide4alt'] = $input['slide4alt'];

	$output['slide5link'] = $input['slide5link'];
	$output['slide5image'] = $input['slide5image'];
	$output['slide5alt'] = $input['slide5alt'];


	// お問い合わせメッセージ
	$output['contact_txt'] = $input['contact_txt'];
	// 電話番号
	$output['tel_number'] = $input['tel_number'];
	// 受付時間
	$output['contact_time'] = $input['contact_time'];
	// フッター左下とフッターコピーライトに表示させるサイト名（あるいは企業名・店舗名・サービス名）
	$output['sub_sitename'] = $input['sub_sitename'];
	// 住所
	$output['contact_address'] = $input['contact_address'];

	// お問い合わせページのURL
	$output['contact_link'] = $input['contact_link'];

	// 共通キーワード
	$output['commonKeyWords'] = $input['commonKeyWords'];
	// GoogleAnalytics ID
	$output['gaID'] = $input['gaID'];

	// PR1タイトル
	$output['pr1_title'] = $input['pr1_title'];
	// PR1概要
	$output['pr1_description'] = $input['pr1_description'];
	// PR1リンクURL
	$output['pr1_link'] = $input['pr1_link'];
	// PR2タイトル
	$output['pr2_title'] = $input['pr2_title'];
	// PR2概要
	$output['pr2_description'] = $input['pr2_description'];
	// PR2リンクURL
	$output['pr2_link'] = $input['pr2_link'];
	// PR3タイトル
	$output['pr3_title'] = $input['pr3_title'];
	// PR3概要
	$output['pr3_description'] = $input['pr3_description'];
	// PR3リンクURL
	$output['pr3_link'] = $input['pr3_link'];


	// お知らせ、ブログ リスト表示
	$output['listInfoTop'] = $input['listInfoTop'];
	$output['listInfoArchive'] = $input['listInfoArchive'];
	$output['listBlogTop'] = $input['listBlogTop'];
	$output['listBlogArchive'] = $input['listBlogArchive'];

	// BlogRSS
	$output['blogRss'] = $input['blogRss'];

	// topContentsBottom
	$output['topContentsBottom'] = $input['topContentsBottom'];


	// twitterアカウント
	$output['twitter'] = $input['twitter'];

	// facebookへのリンク
	$output['facebook'] = $input['facebook'];
	// facebookのアプリケーションID
	$output['fbAppId'] = $input['fbAppId'];
	// facebookのadminID
	$output['fbAdminId'] = $input['fbAdminId'];
	
	// OGPイメージ
	$output['ogpImage'] = $input['ogpImage'];

	// ソーシャルボタン表示指定
	$output['snsBtnsFront'] = $input['snsBtnsFront'];
	$output['snsBtnsPage'] = $input['snsBtnsPage'];
	$output['snsBtnsPost'] = $input['snsBtnsPost'];
	$output['snsBtnsInfo'] = $input['snsBtnsInfo'];
	$output['snsBtnsHidden'] = $input['snsBtnsHidden'];

	// facebookコメント表示指定
	$output['fbCommentsFront'] = $input['fbCommentsFront'];
	$output['fbCommentsPage'] = $input['fbCommentsPage'];
	$output['fbCommentsPost'] = $input['fbCommentsPost'];
	$output['fbCommentsInfo'] = $input['fbCommentsInfo'];
	$output['fbCommentsHidden'] = $input['fbCommentsHidden'];

	// facebookLikeBox指定
	$output['fbLikeBoxFront'] = $input['fbLikeBoxFront'];
	$output['fbLikeBoxSide'] = $input['fbLikeBoxSide'];
	$output['fbLikeBoxURL'] = $input['fbLikeBoxURL'];
	$output['fbLikeBoxStream'] = $input['fbLikeBoxStream'];
	$output['fbLikeBoxFace'] = $input['fbLikeBoxFace'];
	$output['fbLikeBoxHeight'] = $input['fbLikeBoxHeight'];

	// mixiチェックキー
	$output['mixiKey'] = $input['mixiKey'];

	// ガラケーカラー
	$output['galaTheme_style'] = $input['galaTheme_style'];
	// ガラケートップ画像
	$output['galaLogo'] = $input['galaLogo'];

	// Theme layout must be in our array of theme layout options
	if ( isset( $input['theme_layout'] ) && array_key_exists( $input['theme_layout'], biz_vektor_layouts() ) )
		$output['theme_layout'] = $input['theme_layout'];

	return apply_filters( 'biz_vektor_theme_options_validate', $output, $input, $defaults );
}

?>