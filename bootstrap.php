<?php
use Impactwave\News\NewsModule;

ModuleOptions (__DIR__, [
  'templates'  => true,
  'views'      => true,
  'public'     => 'modules/impactwave/news',
  'routes'     => NewsModule::routes (),
//  'publish'    => [],
  'lang'       => true,
//  'assets'     => [],
  'config'     => [
    'main' => [
      'name'                => 'demoapp',
      'appName'             => 'Notícias',
      'title'               => '@ - Notícias',
      'requireLogin'        => true,
    ]
  ],
//  'components' => [],
//  'presets'    => [],
]);
