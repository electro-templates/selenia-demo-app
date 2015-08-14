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
    $this->execute ("
      INSERT INTO news (title, lead, text, date, enabled)
      VALUES ('Greve dos enfermeiros com menos adesão no Alentejo do que em Lisboa',
      'Na quinta-feira o protesto chega ao Algarve. Adesão no Alentejo foi de 69%, mas no Hospital do Litoral Alentejano chegou aos 95%.',
      'A greve dos enfermeiros convocada para esta quarta-feira no Alentejo teve uma adesão de 69%, inferior aos mais de 77% conseguidos no protesto que foi feito na região de Lisboa e Vale do Tejo na terça-feira. Mesmo assim, em unidades como o Hospital do Litoral Alentejano o valor da adesão superou os 95%. Os dados são avançados pelo Sindicato dos Enfermeiros Portugueses (SEP), que explica que na base do descontentamento da classe estão sobretudo questões de desigualdade salarial e de desvalorização da carreira.',
      '$now', 1);
");
  }
}
