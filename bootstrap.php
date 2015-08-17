<?php
use Selene\DemoApp\DemoModule;

ModuleOptions (__DIR__, [
  'templates'  => true,
  'views'      => true,
  'public'     => 'modules/selene-framework/demo-app',
  'routes'     => DemoModule::routes (),
//  'publish'    => [],
  'lang'       => true,
//  'assets'     => [],
  'config'     => [
    'main' => [
      'name'                => 'demoapp',
      'appName'             => '$DEMO_APP',
      'title'               => '@ - $DEMO_APP',
      'requireLogin'        => true,
      'translation'         => true,
    ]
  ],
//  'components' => [],
//  'presets'    => [],
]);
