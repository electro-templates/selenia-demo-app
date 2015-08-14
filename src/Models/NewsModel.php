<?php
namespace Impactwave\News\Models;

use Selene\DataObject;

class NewsModel extends DataObject
{
  public $date;
  public $enabled;
  public $id;
  public $image;
  public $lead;
  public $text;
  public $title;

  public $primaryKeyName = 'id';
  public $tableName = 'news';
  public $fieldNames = [
    'id', 'title', 'lead', 'text', 'date', 'image', 'enabled',
  ];
  public $booleanFields = ['enabled'];
  public $primarySortField = 'date DESC';
  public $gender = 'a';
  public $singular = 'notícia';
  public $plural = 'notícias';
  public $imageFields = ['image'];
}
