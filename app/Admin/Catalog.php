<?php


namespace App\Admin;


use BeetleCore\Fields\Html;
use BeetleCore\Fields\Textbox;
use BeetleCore\Fields\Images;
use BeetleCore\Fields\Relation;

use BeetleCore\Validator\NoEmpty;
use BeetleCore\Validator\Unique;
use App\CatalogItems;

class Catalog extends Admin
{
    protected $table = "catalog";
    protected $primaryKey = "id";
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
    protected $linkSelf = "parent.child";
    protected $links = [
        "parent.child" => ["admin.catalog", "Подкатегории следующего уровня"],
        "parent.items" => ["admin.items", "Товары рубрики"],
        //"page.params" => ["admin.param", "Параметры"],
        //"pages.colors" => ["admin.color", "Цвета"],
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, "parent", "id");
    }

    public function child()
    {
        return $this->hasMany(self::class, "parent", "id");
    }

    public function items()
    {
        return $this->hasMany(CatalogItems::class, "items_parent", "id");
    }
}
