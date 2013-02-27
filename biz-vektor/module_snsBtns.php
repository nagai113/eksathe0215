<!-- [ .socialSet ] -->
<?php if (is_home()) {
$linkUrl = home_url();
} else {
$linkUrl = get_permalink();
}
?>
<div id="socialSet">
<ul style="margin-left:0px;">
<li class="sb_twitter">
<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $linkUrl; ?>" data-lang="ja" data-via="<?php echo twitterID() ?>">ツイート</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</li>
<li class="sb_google"><g:plusone size="medium"></g:plusone></li>
<li class="sb_facebook"><div class="fb-like" data-href="<?php echo $linkUrl; ?>" data-send="true" data-layout="button_count" data-show-faces="false"></div></li>
</ul>

</div>
<!-- [ /.socialSet ] -->