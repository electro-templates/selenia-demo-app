<?php
namespace SeleniaTemplates\DemoApp\Config;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Electro\Application;
use Electro\Authentication\Middleware\AuthenticationMiddleware;
use Electro\Core\Assembly\Services\ModuleServices;
use Electro\Interfaces\Http\RequestHandlerInterface;
use Electro\Interfaces\Http\RouterInterface;
use Electro\Interfaces\ModuleInterface;
use Electro\Interfaces\Navigation\NavigationInterface;
use Electro\Interfaces\Navigation\NavigationProviderInterface;
use Selenia\Platform\Config\PlatformSettings;
use SeleniaTemplates\DemoApp\Controllers\Home;
use SeleniaTemplates\DemoApp\Controllers\NewsForm;
use SeleniaTemplates\DemoApp\Controllers\NewsIndex;

class DemoAppTemplateModule implements ModuleInterface, RequestHandlerInterface, NavigationProviderInterface
{
  /** @var PlatformSettings */
  private $platformSettings;
  /** @var RouterInterface */
  private $router;

  function __invoke (ServerRequestInterface $request, ResponseInterface $response, callable $next)
  {
    $base = $this->platformSettings->urlPrefix ();
    if ($base == '') $base = '*';
    else $base = "$base...";
    return $this->router
      ->set ([
        $base => [
          AuthenticationMiddleware::class,

          '.'        => Home::class,
          'news'     => NewsIndex::class,
          'news/@id' => NewsForm::class,
        ],
      ])
      ->__invoke ($request, $response, $next);
  }

  function configure (ModuleServices $module, RouterInterface $router, PlatformSettings $platformSettings,
                      Application $app)
  {
    $this->router           = $router;
    $this->platformSettings = $platformSettings;
    $app->name              = 'demoapp';       // session cookie name
    $app->appName           = '$DEMO_APP';     // default page title; also displayed on title bar (optional)
    $app->title             = '@ - $DEMO_APP'; // @ = page title
    $app->translation       = true;
    $module
      ->provideTranslations ()
      ->onPostConfig (function () use ($module) {
        $module
          ->registerRouter ($this)
          ->registerNavigation ($this);
      });
  }

  function defineNavigation (NavigationInterface $navigation)
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
