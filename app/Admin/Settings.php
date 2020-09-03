<?php


namespace App\Admin;

use BeetleCore\Fields\Html;
use BeetleCore\Fields\Textbox;

class Settings extends \BeetleCore\Model\Settings
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
