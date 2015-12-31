<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use Selenia\Http\Components\PageComponent;

class Home extends PageComponent
{
  protected function render ()
  { ?>
    <Admin>

      <p>$DEMO_WELCOME</p>

    </Admin>
    <?php
  }

}
