<?php
namespace Impactwave\News\Controllers;

use Impactwave\News\Models\NewsModel;
use Selene\DataObject;
use Selene\Modules\Admin\Controllers\AdminController;

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

        <Field label="Título" name="title">
          <Input value="{{ title }}"/>
        </Field>

        <Field label="Data" name="date">
          <Input type="date" value="{{ date }}"/>
        </Field>

        <Field label="Visível" name="enabled">
          <Checkbox checked="{{ enabled }}"/>
        </Field>

        <Field label="Imagem" name="image">
          <ImageField value="{{ image }}"/>
        </Field>

        <Field label="Lead" name="lead">
          <Input class="veryShortText" type="multiline" value="{{ lead }}"/>
        </Field>

        <Field label="Texto" name="text">
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
