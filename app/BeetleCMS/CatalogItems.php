<?php


namespace App\BeetleCMS;


use BeetleCore\Fields\Checkbox;
use BeetleCore\Fields\Html;
use BeetleCore\Fields\Select;
use BeetleCore\Fields\Textarea;
use BeetleCore\Fields\Textbox;
use BeetleCore\Fields\Images;
use BeetleCore\Fields\Relation;
use BeetleCore\Fields\Integer;
use BeetleCore\Validators\NoEmpty;
use BeetleCore\Validators\Unique;


class CatalogItems extends Admin
{
	protected $table = "catalog_items";
	public $nameKey = "name";
	public $modelName = "Позиции каталога";
	public $modelDescription = "";
	public $positionKey = "position";
    public $activeKey = "active";
	protected $fields = [
		"name" => [
		    "name" => "Название",
            "type" => Textbox::class,
            "validators" => [[NoEmpty::class], [Unique::class]]
        ],
        "title" => [
            "name" => "SEO title",
            "type" => Textbox::class,
        ],
        "description" => [
            "name" => "SEO description",
            "type" => Textarea::class,
        ],
        "keywords" => [
            "name" => "SEO keywords",
            "type" => Textarea::class,
        ],
		"price" => [
		    "name" => "Цена",
            "type" => Integer::class,
            "validators" => [[NoEmpty::class]]
        ],
		"price_sale" => [
		    "name" => "Цена скидкой",
            "type" => Integer::class
        ],
		"body" => [
		    "name" => "Описание",
            "type" => Html::class
        ],
		"img" => [
		    "name" => "Изображение",
            "desc" => "250*250 пикселей",
            "type" => Images::class,
            "width" => 250,
            "height" => 250,
            "show" => true
        ],
		"body" => [
		    "name" => "Описание",
            "type" => Html::class,
            "show" => false
        ],
		"catalog" => [
		    "name" => "Рубрика",
            "text" => "Выберите рубрику для этого товара",
            "type" => Relation::class,
            "show" => false,
            "validators" => [[NoEmpty::class]]
        ],
	];
	protected $settings = [];

	public function catalog()
	{
		return $this->belongsTo(Catalog::class, "parent_id", "id");
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
