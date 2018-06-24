<?php
if(!empty($ctrl->arguments[0]) &&
  !empty($ctrl->inc->options->from_code($ctrl->arguments[0], 'servers', 'server', BBN_APPUI))
){
  $ctrl->obj = $ctrl->get_cached_model([], 400);
}
