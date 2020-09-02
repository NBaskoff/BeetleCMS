<?php


namespace App\Admin;

use BeetleCore\Fields\Html;
use BeetleCore\FileArray;

class Settings extends \BeetleCore\Model\Settings
{
	protected $fields = [
		"user_auth_text" => [
			"name" => "Текст Вход в кабинет покупателя",
			"type" => Html::class,
		],
		"user_reg_text" => [
			"name" => "Текст Регистрация",
			"type" => Html::class,
		],
		"user_reg_active" => [
			"name" => "Письмо об одобрении аккаунта",
			"type" => Html::class,
		],
		"cart_mail" => [
			"name" => "Письмо при заказе клиенту",
			"type" => Html::class,
		],

	];
}
