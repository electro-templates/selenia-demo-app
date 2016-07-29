<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use Selenia\Platform\Components\AdminPageComponent;

class Home extends AdminPageComponent
{
  public $template = <<<'HTML'
    <Content of="main">

      <p>$DEMO_WELCOME</p>

    </Content>

    <Include view="platform/layouts/main.html"/>
HTML;

}
