<?php while(have_posts()): the_post(); ?>
<!-- [ .infoListBox ] -->
<div class="infoListBox">
	<div class="entryTxtBox <?php if ( has_post_thumbnail()) : ?>haveThumbnail<?php endif; ?>">
	<h4 class="entryTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	<p class="entryMeta">
	<span class="infoDate"><?php the_time('Y'); ?>年<?php the_time('m'); ?>月<?php the_time('d'); ?>日</span><span class="infoCate"><?php the_category(' ') ?></span>
	</p>
	<p><?php the_excerpt(); ?></p>
	<p class="moreLink"><a href="<?php the_permalink(); ?>">この記事を読む &raquo;</a></p>
	</div><!-- [ /.entryTxtBox ] -->
	
	<?php if ( has_post_thumbnail()) { ?>
		<div class="thumbImage">
		<div class="thumbImageInner">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
		</div><!-- [ /.thumbImage ] -->
	<?php } ?>	
</div><!-- [ /.infoListBox ] -->
<?php endwhile; ?>
