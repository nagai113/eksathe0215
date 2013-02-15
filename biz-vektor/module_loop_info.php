<?php $taxo_catelist = get_the_term_list( $post->ID,'info-cat','','',''); ?>
<li>
<span class="infoDate"><?php the_time('Y.m.d'); ?></span><span class="infoCate"><?php echo $taxo_catelist; ?></span>
<span class="infoTxt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
</li>