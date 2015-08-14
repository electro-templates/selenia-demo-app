<?php
namespace Impactwave\News\Controllers;

use Selene\Modules\Admin\Controllers\AdminController;

class Home extends AdminController
{
  const ref = __CLASS__;

  protected function model ()
  {
    // TODO: Return a model for the 'default' data source
    return ['some' => 'data'];
  }

  protected function render ()
  { ?>
    <Admin>

      Bem-vindo ao Gestor de Notícias

    </Admin>

    <?php
  }

  protected function viewModel ()
  {
    // TODO: Return additional view models
    return [
      'dataSource1' => ['some' => 'data'],
    ];
  }
}
