<?php
namespace Selenia\Templates\DemoApp;

use Selenia\Templates\DemoApp\Controllers\Home;
use Selenia\Templates\DemoApp\Controllers\NewsIndex;
use Selenia\Templates\DemoApp\Controllers\NewsForm;

class DemoModule
{
  static function routes ()
  {
    return [

      PageRoute ([
        'icon'       => 'fa fa-home',
        'URI'        => '',
        'title'      => '$DEMO_HOME',
        'controller' => Home::ref (),
      ]),

      PageRoute ([
        'URI'        => 'news',
        'title'      => '$NEWS_ARTICLES',
        'controller' => NewsIndex::ref (),
        'isIndex'    => true,
        'links'      => [
          'mainForm' => 'news/{{ id }}'
        ],
        'routes'     => [
          PageRoute ([
            'URI'        => 'news/{id}',
            'controller' => NewsForm::ref (),
            'title'      => '$NEWS_ARTICLE',
          ]),

        ],
      ]),

    ];
  }
}
