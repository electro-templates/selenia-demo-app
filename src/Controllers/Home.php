<?php
namespace Selene\DemoApp\Controllers;

use Selene\Modules\Admin\Controllers\AdminController;

class Home extends AdminController
{
  protected function render ()
  { ?>
    <Admin>

      $DEMO_WELCOME

    </Admin>
    <?php
  }

}
