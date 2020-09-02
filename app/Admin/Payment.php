<?php

namespace App\Admin;

use BeetleCore\Fields\Html;
use BeetleCore\Fields\Textbox;
use BeetleCore\Validator\NoEmpty;
use BeetleCore\Validator\Unique;

class Payment extends Admin
{
    protected $table = "payment";
    protected $primaryKey = "id";
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
