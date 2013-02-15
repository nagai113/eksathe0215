<div class="localSection sideWidget">
<div class="localNaviBox">
<h3 class="localHead">お知らせカテゴリー</h3>
<ul class="localNavi">
<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'info-cat')); ?>
</ul>
</ul>
</div>
</div>

<div class="localSection sideWidget">
<div class="localNaviBox">
<h3 class="localHead">アーカイブ</h3>
<ul class="localNavi">
<?php wp_get_archives('type=yearly&post_type=info&after=年'); ?>
</ul>
</div>
</div>