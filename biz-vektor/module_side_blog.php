<div class="localSection sideWidget">
<div class="localNaviBox">
<h3 class="localHead">ブログカテゴリー</h3>
<ul class="localNavi">
<?php wp_list_categories('title_li='); ?> 
</ul>
</div>
</div>

<div class="localSection sideWidget">
<div class="localNaviBox">
<h3 class="localHead">アーカイブ</h3>
<ul class="localNavi">
<?php wp_get_archives('type=monthly'); ?>
</ul>
</div>
</div>