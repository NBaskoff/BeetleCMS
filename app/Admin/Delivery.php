<?php

namespace App\Admin;

use BeetleCore\Fields\Html;
use BeetleCore\Fields\Integer;
use BeetleCore\Fields\Textbox;
use BeetleCore\Validator\NoEmpty;
use BeetleCore\Validator\Unique;

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
