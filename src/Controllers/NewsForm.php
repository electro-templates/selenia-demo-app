<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use Selenia\Platform\Components\AdminPageComponent;
use SeleniaTemplates\DemoApp\Models\NewsModel;

class NewsForm extends AdminPageComponent
{
  public $template = <<<'HTML'
    <AppPage>
      <FormPanel>
  
        <FormLayout>
  
          <Field label="$DEMO_TITLE" bind=model.title multilang/>
  
          <Field label="$DEMO_DATE" bind=model.date type="date"/>
  
          <Field label="$DEMO_ENABLED" bind=model.enabled type=checkbox/>
  
          <Field label="$DEMO_IMAGE" bind=model.image>
            <ImageField/>
          </Field>
  
          <Field label="$DEMO_LEAD" bind=model.lead multilang>
            <Input class="veryShortText" type="multiline"/>
          </Field>
  
          <Field label="$DEMO_TEXT" bind=model.text multilang>
            <Input class="mediumText" type="multiline"/>
          </Field>
  
        </FormLayout>
  
        <Actions>
          <StandardFormActions key="{model.id}"/>
        </Actions>
        
      </FormPanel>
    </AppPage>
HTML;

  protected function model ()
  {
    $this->modelController->setModel (NewsModel::findOrFail ($this->request->getAttribute('@id')));
  }
}
