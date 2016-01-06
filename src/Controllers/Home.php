<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use Selenia\Plugins\AdminInterface\Components\AdminPageComponent;

class Home extends AdminPageComponent
{
  protected function render ()
  { ?>
    <Admin>

      <p>$DEMO_WELCOME</p>

    </Admin>
    <?php
  }

}
