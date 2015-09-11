<?php
namespace SeleniaTemplates\DemoApp;

use SeleniaTemplates\DemoApp\Controllers\Home;
use SeleniaTemplates\DemoApp\Controllers\NewsIndex;
use SeleniaTemplates\DemoApp\Controllers\NewsForm;

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
