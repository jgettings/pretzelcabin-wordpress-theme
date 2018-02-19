<?php

function pretzelcabin_pagelink_singular($number) {
  $post = get_queried_object();
  $link = trailingslashit(get_permalink($post->ID));
  if ($number > 1 )
      return user_trailingslashit($link . $number);
  else
      return get_permalink($post->ID);
}


function pretzelcabin_displayPagination($currentPage, $totalPages, $pageLinkFunc) {
	if (empty($currentPage))
		$currentPage = 1;

	if (!$totalPages)
		$totalPages = 1;

	if ($totalPages <= 1)
		return;

	$range = 1; //2;
	$showitems = ($range * 2) + 1;


	echo '<nav aria-label="Page navigation" role="navigation" class="pagination-nav">'.
		'<span class="sr-only">Page navigation</span>'.
		'<ul class="pagination justify-content-center ft-wpbs">';

	if ($currentPage > 2 && $currentPage > $range + 1 && $showitems < $totalPages) {
		echo '<li class="page-item">'.
				'<a class="page-link" href="'. $pageLinkFunc(1) .'" aria-label="First Page">'.
					'&laquo;<span class="hidden-sm-down"> First</span>'.
				'</a>'.
			'</li>';
	}
			
	for ($i = 1; $i <= $totalPages; $i++) {
    if (1 != $totalPages && (!($i >= $currentPage + $range + 1 || $i <= $currentPage - $range - 1) || $totalPages <= $showitems)) {
			if ($currentPage == $i) {
				echo '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>' . $i . '</span></li>';
			} else {
				echo '<li class="page-item"><a class="page-link" href="' . $pageLinkFunc($i) . '"><span class="sr-only">Page </span>' . $i . '</a></li>';
			}
		}
	}

	if ($currentPage < $totalPages - 1 &&  $currentPage + $range - 1 < $totalPages && $showitems < $totalPages) {
		echo '<li class="page-item">'.
				'<a class="page-link" href="' . $pageLinkFunc($totalPages) . '" aria-label="Last Page">'.
					'<span class="hidden-sm-down">Last </span>&raquo;'.
				'</a>'.
			'</li>';
	}

	echo '</ul></nav>';
}

?>
