<?php
namespace Selenia\Templates\DemoApp\Controllers;

use Selenia\Modules\Admin\Controllers\AdminController;

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
