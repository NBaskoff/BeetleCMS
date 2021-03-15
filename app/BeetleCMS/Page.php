<?php


namespace App\BeetleCMS;


use BeetleCore\Fields\Html;
use BeetleCore\Fields\Textarea;
use BeetleCore\Fields\Textbox;
use BeetleCore\Fields\Url;
use BeetleCore\Validators\NoEmpty;
use BeetleCore\Validators\Unique;

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
            "name" => "Адрес страницы (url)",
            "type" => Url::class,
            "mask" => "/page/{url}",
            "validators" => [
                [NoEmpty::class],
                [Unique::class]
            ],
        ],
        "title" => [
            "name" => "title",
            "type" => Textbox::class,
            "show" => false,
            "find" => false,
            "tab" => "SEO"
        ],
        "description" => [
            "name" => "description",
            "type" => Textarea::class,
            "show" => false,
            "find" => false,
            "tab" => "SEO"
        ],
        "keywords" => [
            "name" => "keywords",
            "type" => Textarea::class,
            "show" => false,
            "find" => false,
            "tab" => "SEO"
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
