<?php

$range = 1 ; //2
$showitems = ($range * 2) + 1;  

if(empty($paged)) $paged = 1;

$pages = $wp_query->max_num_pages;
if (!$pages) {
	$pages = 1;		 
}

if ($pages != 1) : ?>

	<nav aria-label="Page navigation" role="navigation" class="pagination-nav">
		<span class="sr-only">Page navigation</span>
		<ul class="pagination justify-content-center ft-wpbs">

			<?php if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) : ?>
			<li class="page-item">
				<a class="page-link" href="<?php echo get_pagenum_link(1) ?>" aria-label="First Page">
					&laquo;<span class="hidden-sm-down"> First</span>
				</a>
			</li>
			<?php endif; ?>

			<?php
			for ($i = 1; $i <= $pages; $i++):
    		if (1 != $pages && (!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )):
    			if ($paged == $i): ?>
						<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span><?php echo $i ?></span></li>
					<?php else: ?>
						<li class="page-item"><a class="page-link" href="<?php echo get_pagenum_link($i) ?>"><span class="sr-only">Page </span><?php echo $i ?></a></li>
					<?php
					endif;
				endif;
			endfor;
			?>


			<?php if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) : ?>
			<li class="page-item">
				<a class="page-link" href="<?php echo get_pagenum_link($pages) ?>" aria-label="Last Page">
					<span class="hidden-sm-down">Last </span>&raquo;
				</a>
			</li>
			<?php endif; ?>

		</ul>
  </nav>	 	

<?php endif; ?>
