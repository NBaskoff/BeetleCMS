<?php


namespace App\Admin;


use BeetleCore\Fields\Html;
use BeetleCore\Fields\Integer;
use BeetleCore\Fields\Password;
use BeetleCore\Fields\Textbox;
use BeetleCore\Fields\Images;
use BeetleCore\Fields\Relation;

use BeetleCore\Validators\NoEmpty;
use BeetleCore\Validators\Unique;
use App\userItems;

class User extends Admin
{
	protected $table = "user";
	public $modelName = "Пользователи сайта";
	public $nameKey = "name";
	protected $fields = [
		"name" => [
			"name" => "ФИО",
			"type" => Textbox::class,
			"validators" => [
				[NoEmpty::class],
			],
		],
		"email" => [
			"name" => "Email",
			"type" => Textbox::class,
			"validators" => [
				[NoEmpty::class],
				[Unique::class]
			],
		],
		"phone" => [
			"name" => "Телефон",
			"type" => Textbox::class,
		],
		"pass" => [
			"name" => "Пароль",
			"type" => Password::class,
			"show" => false
		],
		"sale" => [
			"name" => "Скидка",
			"type" => Integer::class,
		],
	];
	protected $settings = [];


}
