<?php
namespace SeleniaTemplates\DemoApp\Config;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Selenia\Authentication\Middleware\AuthenticationMiddleware;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Interfaces\Http\RouterInterface;
use Selenia\Interfaces\ModuleInterface;
use Selenia\Interfaces\Navigation\NavigationInterface;
use Selenia\Interfaces\Navigation\NavigationProviderInterface;
use SeleniaTemplates\DemoApp\Controllers\Home;
use SeleniaTemplates\DemoApp\Controllers\NewsForm;
use SeleniaTemplates\DemoApp\Controllers\NewsIndex;

class DemoAppModule implements ModuleInterface, NavigationProviderInterface
{
  /** @var RouterInterface */
  private $router;

  function __invoke (ServerRequestInterface $request, ResponseInterface $response, callable $next)
  {
    return $this->router
      ->set ([
        '.' => [AuthenticationMiddleware::class, Home::class],

        'news' => [
          AuthenticationMiddleware::class,
          '.'        => NewsIndex::class,
          'news/@id' => NewsForm::class,
        ],
      ])
      ->__invoke ($request, $response, $next);
  }

  function configure (ModuleServices $module, RouterInterface $router)
  {
    $this->router = $router;
    $module
      ->registerRouter ($this)
      ->provideNavigation ($this)
      ->provideTranslations ()
      ->setDefaultConfig ([
        'main' => [
          'name'        => 'demoapp',       // session cookie name
          'appName'     => '$DEMO_APP',
          'title'       => '@ - $DEMO_APP', // @ = page title
          'translation' => true,
        ],
      ]);
  }

  function defineNavigation (NavigationInterface $navigation)
  {
    $navigation->add ([
      ''     => $navigation
        ->link ()
        ->id ('home')
        ->title ('$DEMO_HOME')
        ->icon ('fa fa-home'),
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
    ]);
  }

}
