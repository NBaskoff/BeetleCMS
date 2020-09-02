<?php


namespace App\Admin;


use BeetleCore\Fields\Checkbox;
use BeetleCore\Fields\Html;
use BeetleCore\Fields\Select;
use BeetleCore\Fields\Textbox;
use BeetleCore\Fields\Images;
use BeetleCore\Fields\Relation;
use BeetleCore\Fields\Integer;
use BeetleCore\Validator\NoEmpty;
use BeetleCore\Validator\Unique;


class CatalogItems extends Admin
{
	protected $table = "catalog_items";
	protected $primaryKey = "id";
	public $nameKey = "name";
	public $modelName = "Позиции каталога";
	public $modelDescription = "";
	public $positionKey = "position";
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $fields = [
		"name" => ["name" => "Название", "type" => Textbox::class, "validators" => [[NoEmpty::class], [Unique::class]],],
		"display" => ["name" => "Опубликовать", "type" => Checkbox::class, "default" => "Y"],
		"price" => ["name" => "Цена", "type" => Integer::class, "validators" => [[NoEmpty::class],],],
		"price_sale" => ["name" => "Цена скидкой", "type" => Integer::class,],
		"price_day" => ["name" => "День недели", "type" => Select::class, "data" => [1 => "Понедельник", 2 => "Вторник", 3 => "Среда", 4 => "Четверг", 5 => "Пятница", 6 => "Суббота", 7 => "Воскресенье",]],
		"img" => ["name" => "Изображение", "desc" => "250*250 пикселей", "type" => Images::class, "width" => 250, "height" => 250, "show" => true], "body" => ["name" => "Описание", "type" => Html::class, "show" => false], "parent" => ["name" => "Рубрика", "text" => "Выберите рубрику для этого товара", "type" => Relation::class, "show" => false, "validators" => [[NoEmpty::class],],],
	];
	protected $settings = [];

	public function parent()
	{
		return $this->belongsTo(Catalog::class, "parent", "catalog_id");
	}

	public function image()
	{
		$image = json_decode($this->img, true);
		if (!empty($image)) {
			return $image[0]["img"];
		} else {
			return "/i/no_image.png";
		}
	}

	public function original()
	{
		$image = json_decode($this->img, true);
		if (!empty($image)) {
			return $image[0]["file"];
		} else {
			return "/i/no_image.png";
		}
	}

	public function images()
	{
		$images = json_decode($this->img, true);
		if (!empty($images)) {
			return $images;
		} else {
			return [["img" => "/i/no_image.png"]];
		}
	}
}
