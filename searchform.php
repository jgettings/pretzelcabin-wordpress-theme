
<form class="form" id="searchform" role="search" method="get" action="<?php echo home_url( '/' ); ?>">

  <label class="sr-only" for="s">Search</label>

  <div class="input-group mb-2">
    <input type="text" class="form-control" id="s" name="s" placeholder="<?php echo __('Search', 'pretzel-cabin'); ?>">

    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">
      	<i class="fas fa-search"></i>
      	<span class="sr-only">
					<?php echo __('Search', 'pretzel-cabin'); ?>
				</span>
			</button>
    </div>
  </div>

</form>
