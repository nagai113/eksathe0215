<ul class="entryList">
<?php while(have_posts()): the_post(); ?>
<li>
<span class="infoDate"><?php the_time('Y.m.d'); ?></span>
<span class="infoCate"><?php the_category(' ') ?></span>
<span class="infoTxt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
</li>
<?php endwhile; ?>
</ul>