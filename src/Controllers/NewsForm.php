<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use Selenia\Plugins\AdminInterface\Components\AdminPageComponent;
use SeleniaTemplates\DemoApp\Models\NewsModel;

class NewsForm extends AdminPageComponent
{
  protected function model ()
  {
    return $this->loadRequested (new NewsModel);
  }

  protected function render ()
  { ?>
    <FormPage>

      <FormLayout>

        <Field label="$DEMO_TITLE" name="title">
          <Input value="{{ model.title }}"/>
        </Field>

        <Field label="$DEMO_DATE" name="date">
          <Input type="date" value="{{ model.date }}"/>
        </Field>

        <Field label="$DEMO_ENABLED" name="enabled">
          <Checkbox checked="{{ model.enabled }}"/>
        </Field>

        <Field label="$DEMO_IMAGE" name="image">
          <ImageField value="{{ model.image }}"/>
        </Field>

        <Field label="$DEMO_LEAD" name="lead">
          <Input class="veryShortText" type="multiline" value="{{ model.lead }}"/>
        </Field>

        <Field label="$DEMO_TEXT" name="text">
          <Input class="mediumText" type="multiline" value="{{ model.text }}"/>
        </Field>

      </FormLayout>

      <Actions>
        <ButtonsSaveDelete key="{{ model.id }}" model="user"/>
      </Actions>
    </FormPage>

    <?php
  }

}
