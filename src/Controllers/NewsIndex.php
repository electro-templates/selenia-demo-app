<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use Selenia\Plugins\AdminInterface\Components\AdminPageComponent;
use SeleniaTemplates\DemoApp\Models\NewsModel;

class NewsIndex extends AdminPageComponent
{
  public $template = <<<'HTML'
    <GridPage>

      <DataGrid data="{{ model }}" as="i:r" onClickGoTo="{{ navigation.newsForm }}{{ r.id }}">

        <Column width="40" type="row-selector">
          {{ i|ord }}
        </Column>

        <Column width="30" type="input" align="center">
          <Checkbox name="sel[]" value="{{ r.id }}"/>
        </Column>

        <Column width="80" title="$DEMO_DATE">
          {{ r.date }}
        </Column>

        <Column width="50%" title="$DEMO_TITLE">
          {{ r.title_pt }}
        </Column>

      </DataGrid>

      <Actions>
        <ButtonNew url="{{ navigation.newsForm }}">
          <Button class="btn-danger"
                  action="delete"
                  label="$BUTTON_DELETE"
                  disabled="{{ !model }}"
                  confirm
                  message="$APP_DELETE_CONFIRM {{ modelInfo.gender }} {{ modelInfo.singular }} / {{ modelInfo.plural }}?"/>
        </ButtonNew>
      </Actions>
    </GridPage>
HTML;

  function action_delete ($param = null)
  {
    $data      = $this->request->getParsedBody ();
    $selection = get ($data, 'sel');
    if ($selection) {
      $ids = implode (',', $selection);
      database_query ("DELETE FROM " . NewsModel::table () . " WHERE id IN ($ids)");
      $this->session->flashMessage ('$ADMIN_MSG_DELETED');
    }
  }

  protected function model ()
  {
    $this->modelInfo = new NewsModel;
    return $this->modelInfo->all ();
  }

}
