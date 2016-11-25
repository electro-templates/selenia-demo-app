<?php
namespace SeleniaTemplates\DemoApp\Config;

use Electro\Interfaces\Http\RequestHandlerInterface;
use Electro\Interfaces\Http\RouterInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Selenia\Platform\Config\PlatformSettings;

class Routes implements RequestHandlerInterface
{
  /** @var PlatformSettings */
  private $platformSettings;
  /** @var RouterInterface */
  private $router;

  public function __construct (RouterInterface $router, PlatformSettings $platformSettings)
  {
    $this->router           = $router;
    $this->platformSettings = $platformSettings;
  }

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

}
