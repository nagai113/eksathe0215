<?php
/*-------------------------------------------*/
/*	ページネームのカスタムフィールドを設定 不使用
/*-------------------------------------------*/
/*
add_action('admin_menu', 'add_custom_field_1');
add_action('save_post', 'save_custom_field_1');

function add_custom_field_1(){
  if(function_exists('add_custom_field_1')){
    add_meta_box('div1', 'ページのサブタイトル', 'insert_custom_field_1', 'page', 'normal', 'high');
  }
}

function insert_custom_field_1(){
  global $post;
  echo '<input type="hidden" name="noncename_custom_field_1" id="noncename_custom_field_1" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />';
  echo '<label class="hidden" for="subPageName">ページのサブタイトル</label><input type="text" name="subPageName" size="50" value="'.get_post_meta($post->ID, 'subPageName', true).'" />';
  echo '<p>ページのサブタイトル（英語表記など） 【記入例】 Service </p>';
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

  $data = $_POST['subPageName'];

  if(get_post_meta($post_id, 'subPageName') == ""){
    add_post_meta($post_id, 'subPageName', $data, true);
  }elseif($data != get_post_meta($post_id, 'subPageName', true)){
    update_post_meta($post_id, 'subPageName', $data);
  }elseif($data == ""){
    delete_post_meta($post_id, 'subPageName', get_post_meta($post_id, 'subPageName', true));
  }
}
*/

/*-------------------------------------------*/
/*	ダッシュボードにウィジェット追加
/*-------------------------------------------*/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;
	?>
    _|＼○_ﾋｬｯ ε＝＼_○ﾉ ﾎｰｳ!!
    へいへいへ～い！
    <?php
//    wp_add_dashboard_widget('custom_help_widget', 'サイト管理者からのお知らせ', 'dashboard_text');
}
function dashboard_text() {
    echo '
    <p>ダッシュボードに任意のhtmlを表示させることができます。<br />
    必要ない場合は、テーマのための関数（functions.php）で該当の場所を削除してください。</p>
    ';
}

?>