<?php
namespace Impactwave\News\Controllers;

use Impactwave\News\Models\NewsModel;
use Selene\DataObject;
use Selene\Exceptions\Status;
use Selene\Modules\Admin\Controllers\AdminController;

class NewsIndex extends AdminController
{
  function action_delete (DataObject $data = null, $param = null)
  {
    $selection = param ('sel');
    if (!empty ($selection)) {
      $ids = implode (',', $selection);
      database_query ("DELETE FROM " . NewsModel::table () . " WHERE id IN ($ids)");
      $this->setStatus (Status::INFO, "Os registos foram apagados.");
    }
  }

  protected function model ()
  {
    return (new NewsModel)->all ();
  }

  protected function render ()
  { ?>
    <GridPage>

      <DataGrid data="{{ !default }}" onClickGoTo="{{ !links.mainForm }}">

        <Column width="40" type="row-selector">
          {{ #ord }}
        </Column>

        <Column width="30" type="input" align="center">
          <Checkbox name="sel[]" value="{{ id }}"/>
        </Column>

        <Column width="80" title="Data">
          {{ date }}
        </Column>

        <Column width="50%" title="Título">
          {{ title }}
        </Column>

      </DataGrid>

      <Actions>
        <ButtonNew url="{{ !links.mainForm }}">
          <Button class="btn-danger" action="delete" label="Apagar sel."/>
        </ButtonNew>
      </Actions>
    </GridPage>

    <?php
  }

}
