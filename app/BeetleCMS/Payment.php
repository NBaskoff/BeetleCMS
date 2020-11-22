<?php

namespace App\BeetleCMS;

use BeetleCore\Fields\Html;
use BeetleCore\Fields\Textbox;
use BeetleCore\Validators\NoEmpty;
use BeetleCore\Validators\Unique;

class Payment extends Admin
{
    protected $table = "payment";
    public $modelName = "Способы оплаты";
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
