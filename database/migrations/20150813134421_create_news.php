<?php
use Electro\Plugins\IlluminateDatabase\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateNews extends AbstractMigration
{
  /**
   * Reverse the migration.
   *
   * @return void
   */
  function down ()
  {
    $schema = $this->db->schema ();

    if ($this->db->hasTable ('news')) {
      $schema->drop ('news');
      $this->output->writeln ("  Dropped table <info>news</info>.");
    }
    else $this->output->writeln (" == Table <info>news</info> doesn't exist. Skipped.");
  }

  /**
   * Run the migration.
   *
   * @return void
   */
  public function up ()
  {
    $schema = $this->db->schema ();

    if (!$this->db->hasTable ('news')) {
      $schema->create ('news', function (Blueprint $t) {
        $t->increments ('id');
        $t->string ('title_pt', 30)->nullable ();
        $t->string ('title_en', 30)->nullable ();
        $t->string ('lead_pt', 200)->nullable ();
        $t->string ('lead_en', 200)->nullable ();
        $t->string ('text_pt', 5000)->nullable ();
        $t->string ('text_en', 5000)->nullable ();
        $t->date ('date');
        $t->string ('image', 60)->nullable ();
        $t->string ('file', 60)->nullable ();
        $t->boolean ('enabled')->default (false);
        $t->index ('date');
        $t->index ('enabled');
      });
      $now = date ('Y-m-d H:i:s');
      /** @noinspection SqlNoDataSourceInspection */
      $this->db->connection ()->insert (<<<SQL
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
}
