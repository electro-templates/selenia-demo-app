<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use Selenia\Plugins\AdminInterface\Controllers\AdminController;

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
