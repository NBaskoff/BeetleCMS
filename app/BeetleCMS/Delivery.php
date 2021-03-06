<?php

namespace App\BeetleCMS;

use BeetleCore\Fields\Html;
use BeetleCore\Fields\Integer;
use BeetleCore\Fields\Textbox;
use BeetleCore\Validators\NoEmpty;
use BeetleCore\Validators\Unique;

class Delivery extends Admin
{
    protected $table = "delivery";
    public $modelName = "Способы доставки";
    public $modelDescription = "";
    public $positionKey = "position";
    public $nameKey = "name";
    protected $fields = [
        "name" => [
            "name" => "Название",
            "type" => Textbox::class,
            "validators" => [
                [NoEmpty::class],
                [Unique::class]
            ],
        ],
        "price" => [
            "name" => "Цена",
            "type" => Textbox::class,
        ],
        "body" => [
            "name" => "Подробнее",
            "type" => Html::class,
            "show" => false
        ],
    ];
    protected $settings = [];
    protected $relations = [];
    protected $links = [];
    protected $linkSelf = "";

}
