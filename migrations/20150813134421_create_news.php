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
      ->addColumn ('title', 'string', ['limit' => 30])
      ->addColumn ('lead', 'string', ['limit' => 200])
      ->addColumn ('text', 'string', ['limit' => 5000])
      ->addColumn ('date', 'datetime')
      ->addColumn ('image', 'string', ['limit' => 60])
      ->addColumn ('enabled', 'boolean', ['default' => 0])
      ->create ();
    $now = date ('Y-m-d H:i:s');
    /** @noinspection SqlNoDataSourceInspection */
    $this->execute (<<<SQL
      INSERT INTO news (title, lead, text, date, enabled)
      VALUES ('Google announces name of Android update',
      'Google''s update for Android, its mobile operating system, officially has a name: Marshmallow.',
      'The software, previously only referred to as Android M, was announced in May during Google I/O, the search giant''s annual developer conference.
      The moniker follows Google''s whimsical naming convention for new versions of Android.
      The company typically names its software updates alphabetically and after sweets.',
      '$now', 1);
SQL
);
  }
}
