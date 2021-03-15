<?php


namespace App\BeetleCMS;

use BeetleCore\Fields\Images;
use BeetleCore\Fields\Textarea;
use BeetleCore\Fields\Textbox;

class Settings extends \BeetleCore\Models\Settings
{
    protected $fields = [
        "title" => [
            "name" => "Название сайта",
            "type" => Textbox::class,
        ],
        "description" => [
            "name" => "description",
            "type" => Textarea::class,
            "tab" => "SEO"
        ],
        "keywords" => [
            "name" => "keywords",
            "type" => Textarea::class,
            "tab" => "SEO"
        ],
        "favicon" => [
            "name" => "Favicon",
            "type" => Images::class,
            "width" => 64,
            "height" => 64
        ],
        "phone" => [
            "name" => "Телефон",
            "type" => Textbox::class,
        ],
        "email" => [
            "name" => "Email",
            "type" => Textbox::class,
        ],
        "address" => [
            "name" => "Адрес",
            "type" => Textbox::class,
        ],
        "js" => [
            "name" => "JS скрипты (Яндекс метрика и т.д.)",
            "type" => Textarea::class,
        ],
        /*"cart_mail" => [
            "name" => "Письмо при заказе клиенту",
            "type" => Html::class,
        ],*/
    ];
}
