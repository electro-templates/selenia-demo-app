<?php

use Phinx\Migration\AbstractMigration;

class CreateNews extends AbstractMigration
{
  /**
   * Change Method.
   *
   * Write your reversible migrations using this method.
   *
   * More information on writing migrations is available here:
   * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
   */
  public function change ()
  {
    $this
      ->table ('news')
      ->addColumn ('title_pt', 'string', ['limit' => 30])
      ->addColumn ('title_en', 'string', ['limit' => 30])
      ->addColumn ('lead_pt', 'string', ['limit' => 200])
      ->addColumn ('lead_en', 'string', ['limit' => 200])
      ->addColumn ('text_pt', 'string', ['limit' => 5000])
      ->addColumn ('text_en', 'string', ['limit' => 5000])
      ->addColumn ('date', 'datetime')
      ->addColumn ('image', 'string', ['limit' => 60])
      ->addColumn ('file', 'string', ['limit' => 60])
      ->addColumn ('enabled', 'boolean', ['default' => 0])
      ->addIndex('date')
      ->addIndex('enabled')
      ->create ();
    $now = date ('Y-m-d H:i:s');
    /** @noinspection SqlNoDataSourceInspection */
    $this->execute (<<<SQL
      INSERT INTO news (title_en, lead_en, text_en, title_pt, lead_pt, text_pt, date, enabled)
      VALUES (
      'Google announces name of Android update',
      'Google''s update for Android, its mobile operating system, officially has a name: Marshmallow.',
      'The software, previously only referred to as Android M, was announced in May during Google I/O, the search giant''s annual developer conference.
      The moniker follows Google''s whimsical naming convention for new versions of Android.
      The company typically names its software updates alphabetically and after sweets.',

      'Google anuncia nome da atualização do Android',
      'A atualização da Google para o Android, seu sistema operacional móvel, oficialmente tem um nome: Marshmallow.',
      'O software, anteriormente apenas referido como Android M, foi anunciado em maio, durante o Google I/O, a conferência anual de desenvolvedores do gigante das buscas.
       O apelido segue a caprichosa convenção de nomenclatura da Google para novas versões do Android.
       A empresa tipicamente batiza as suas atualizações de software em ordem alfabética e com o nome de doces.',

      '$now', 1);
SQL
);
  }
}
