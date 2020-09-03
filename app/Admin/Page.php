<?php


namespace App\Admin;


use BeetleCore\Fields\Html;
use BeetleCore\Fields\Textbox;
use BeetleCore\Fields\Relation;

use BeetleCore\Validator\NoEmpty;
use BeetleCore\Validator\Unique;

class Page extends Admin
{
    protected $table = "page";
    public $modelName = "Страницы";
    public $modelDescription = "";
    public $positionKey = "position";
    protected $fields = [
        "name" => [
            "name" => "Название",
            "type" => Textbox::class,
            "validators" => [
                [NoEmpty::class],
                [Unique::class]
            ],
        ],
        "link" => [
            "name" => "Адрес",
            "type" => Textbox::class,
            "validators" => [
                [NoEmpty::class],
                [Unique::class]
            ],
        ],
        "body" => [
            "name" => "Текст",
            "type" => Html::class,
            "show" => false
        ],
        /*"colors" => [
            "name" => "Цвета",
            "type" => Relation::class,
            "show" => false,
            "find" => false
        ]*/
    ];
    protected $settings = [];
    protected $links = [
        //"colors.pages" => ["admin.color", "Цвета"],
    ];


}
