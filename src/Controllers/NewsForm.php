<?php
namespace SeleniaTemplates\DemoApp\Controllers;

use SeleniaTemplates\DemoApp\Models\NewsModel;
use Selenia\DataObject;
use Selenia\Plugins\AdminInterface\Controllers\AdminController;

class NewsForm extends AdminController
{
  protected function model ()
  {
    return $this->loadRequested(new NewsModel);
  }

  protected function render ()
  { ?>
    <FormPage>

      <FormLayout>

        <Field label="$NEWS_TITLE" name="title">
          <Input value="{{ title }}"/>
        </Field>

        <Field label="$NEWS_DATE" name="date">
          <Input type="date" value="{{ date }}"/>
        </Field>

        <Field label="$NEWS_ENABLED" name="enabled">
          <Checkbox checked="{{ enabled }}"/>
        </Field>

        <Field label="$NEWS_IMAGE" name="image">
          <ImageField value="{{ image }}"/>
        </Field>

        <Field label="$NEWS_LEAD" name="lead">
          <Input class="veryShortText" type="multiline" value="{{ lead }}"/>
        </Field>

        <Field label="$NEWS_TEXT" name="text">
          <Input class="mediumText" type="multiline" value="{{ text }}"/>
        </Field>

      </FormLayout>

      <Actions>
        <ButtonsSaveDelete key="{{ id }}"/>
      </Actions>
    </FormPage>

    <?php
  }

}
