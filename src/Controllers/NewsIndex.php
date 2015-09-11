<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use SeleniaTemplates\DemoApp\Models\NewsModel;
use Selenia\DataObject;
use Selenia\Exceptions\Status;
use Selenia\Plugins\AdminInterface\Controllers\AdminController;

class NewsIndex extends AdminController
{
  function action_delete (DataObject $data = null, $param = null)
  {
    $selection = param ('sel');
    if (!empty ($selection)) {
      $ids = implode (',', $selection);
      database_query ("DELETE FROM " . NewsModel::table () . " WHERE id IN ($ids)");
      $this->setStatus (Status::INFO, '$ADMIN_MSG_DELETED');
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

        <Column width="80" title="$DEMO_DATE">
          {{ date }}
        </Column>

        <Column width="50%" title="$DEMO_TITLE">
          {{ title }}
        </Column>

      </DataGrid>

      <Actions>
        <ButtonNew url="{{ !links.mainForm }}">
          <Button class="btn-danger" action="delete" label="$BUTTON_DELETE" confirm
                  message="$ADMIN_DELETE_CONFIRM {{ gender }} {{ singular }} / {{ plural }}?"/>
        </ButtonNew>
      </Actions>
    </GridPage>

    <?php
  }

}
