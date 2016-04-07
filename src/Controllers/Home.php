<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use Selenia\Plugins\AdminInterface\Components\AdminPageComponent;

class Home extends AdminPageComponent
{
  public $template = <<<'HTML'
    <Content of="main">

      <p>$DEMO_WELCOME</p>

    </Content>

    <Include view="layouts/main.html"/>
HTML;

}
