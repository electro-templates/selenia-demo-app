<?php
namespace SeleniaTemplates\DemoApp\Config;

use Electro\Interfaces\Navigation\NavigationInterface;
use Electro\Interfaces\Navigation\NavigationProviderInterface;

class Navigation implements NavigationProviderInterface
{
  function defineNavigation (NavigationInterface $nav)
  {
    $navigation->add ([
      '' => $navigation
        ->group ()
        ->title ('$DEMO_APP')
        ->icon ('fa fa-home')
        ->links ([
          'news' => $navigation
            ->link ()
            ->title ('$NEWS_ARTICLES')
            ->icon ('fa fa-file-text')
            ->links ([
              '@id' => $navigation
                ->link ()
                ->id ('newsForm')
                ->title ('$NEWS_ARTICLE'),
            ]),
        ]),
    ], true, 'app_home');
  }


}
