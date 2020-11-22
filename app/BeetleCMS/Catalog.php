<?php


namespace App\BeetleCMS;


use BeetleCore\Fields\Html;
use BeetleCore\Fields\Textbox;
use BeetleCore\Fields\Images;
use BeetleCore\Fields\Relation;

use BeetleCore\Validators\NoEmpty;
use BeetleCore\Validators\Unique;


class Catalog extends Admin
{
    protected $table = "catalog";
    public $modelName = "Каталог";
    public $modelDescription = "";
    public $positionKey = "position";
    public $nameKey = "name";
    protected $fields = [
        "name" => [
            "name" => "Название",
            "type" => Textbox::class,
            "validators" => [
                [NoEmpty::class],
                //[Unique::class]
            ],
        ],
        "img" => [
            "name" => "Изображение рубрики",
            "type" => Images::class,
            "width" => 340,
            "height" => 260,
            "show" => false
        ],
        /*"body" => [
            "name" => "Текст",
            "type" => Html::class,
            "show" => false
        ],*/
        "parent" => [
            "name" => "Корневая дирректория",
            "text" => "Выберите корневую дирректорию",
            "type" => Relation::class,
            "show" => false,
            "find" => false
        ]
    ];
    protected $settings = [];
    protected $linkSelf = "child.parent";
    protected $links = [
        "child.parent" => ["admin.catalog", "Подкатегории следующего уровня"],
        "items.catalog" => ["admin.catalog_items", "Товары рубрики"],
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, "parent_id", "id");
    }

    public function child()
    {
        return $this->hasMany(self::class, "parent_id", "id");
    }

    public function items()
    {
        return $this->hasMany(CatalogItems::class, "parent_id", "id");
    }
}
