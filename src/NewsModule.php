<?php
namespace Impactwave\News;

use Impactwave\News\Controllers\Home;
use Impactwave\News\Controllers\NewsIndex;
use Impactwave\News\Controllers\NewsForm;

class NewsModule
{
  static function routes ()
  {
    return [

      PageRoute ([
        'icon'       => 'fa fa-home',
        'URI'        => '',
        'title'      => 'Início',
        'controller' => Home::ref (),
      ]),

      PageRoute ([
        'URI'        => 'news',
        'title'      => 'Notícias',
        'controller' => NewsIndex::ref (),
        'isIndex'    => true,
        'links'      => [
          'mainForm' => 'news/{{ id }}'
        ],
        'routes'     => [
          PageRoute ([
            'URI'        => 'news/{id}',
            'controller' => NewsForm::ref (),
            'title'      => 'Edit News',
          ]),

        ],
      ]),

    ];
  }
}
