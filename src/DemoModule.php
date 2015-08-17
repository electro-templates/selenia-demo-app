<?php
namespace Selene\DemoApp;

use Selene\DemoApp\Controllers\Home;
use Selene\DemoApp\Controllers\NewsIndex;
use Selene\DemoApp\Controllers\NewsForm;

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
