<?php
namespace SeleniaTemplates\DemoApp\Config;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Selenia\Authentication\Middleware\AuthenticationMiddleware;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Interfaces\Http\RequestHandlerInterface;
use Selenia\Interfaces\Http\RouterInterface;
use Selenia\Interfaces\ModuleInterface;
use Selenia\Interfaces\Navigation\NavigationInterface;
use Selenia\Interfaces\Navigation\NavigationProviderInterface;
use Selenia\Plugins\AdminInterface\Config\AdminInterfaceSettings;
use SeleniaTemplates\DemoApp\Controllers\Home;
use SeleniaTemplates\DemoApp\Controllers\NewsForm;
use SeleniaTemplates\DemoApp\Controllers\NewsIndex;

class DemoAppModule implements ModuleInterface, RequestHandlerInterface, NavigationProviderInterface
{
  /** @var AdminInterfaceSettings */
  private $adminSettings;
  /** @var RouterInterface */
  private $router;

  function __invoke (ServerRequestInterface $request, ResponseInterface $response, callable $next)
  {
    $base = $this->adminSettings->urlPrefix ();
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

  function configure (ModuleServices $module, RouterInterface $router, AdminInterfaceSettings $adminSettings)
  {
    $this->router        = $router;
    $this->adminSettings = $adminSettings;
    $module
      ->provideTranslations ()
      ->setDefaultConfig ([
        'main' => [
          'name'        => 'demoapp',       // session cookie name
          'appName'     => '$DEMO_APP',
          'title'       => '@ - $DEMO_APP', // @ = page title
          'translation' => true,
        ],
      ])
      ->onPostConfig (function () use ($module) {
        $module
          ->registerRouter ($this)
          ->provideNavigation ($this);
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
