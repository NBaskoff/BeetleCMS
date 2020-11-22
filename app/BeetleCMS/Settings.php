<?php


namespace App\BeetleCMS;

use BeetleCore\Fields\Html;
use BeetleCore\Fields\Textbox;

class Settings extends \BeetleCore\Models\Settings
{
	protected $fields = [
		"title" => [
			"name" => "Название сайта",
			"type" => Textbox::class,
		],
		"cart_mail" => [
			"name" => "Письмо при заказе клиенту",
			"type" => Html::class,
		],

	];
}
