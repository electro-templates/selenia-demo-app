<?php
namespace SeleniaTemplates\DemoApp\Models;

use Selenia\DataObject;

class NewsModel extends DataObject
{
  public $date;
  public $enabled;
  public $id;
  public $image;
  public $lead;
  public $text;
  public $title;

  public $primaryKeyName    = 'id';
  public $tableName         = 'news';
  public $fieldNames        = [
    'id', 'title', 'lead', 'text', 'date', 'image', 'enabled',
  ];
  public $booleanFields     = ['enabled'];
  public $primarySortField  = 'date DESC';
  public $gender            = '$NEWS_GENDER';
  public $singular          = '$NEWS_ARTICLE';
  public $plural            = '$NEWS_ARTICLES';
  public $imageFields       = ['image'];
}
