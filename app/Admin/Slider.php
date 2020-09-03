<?php


namespace App\Admin;


use BeetleCore\Fields\Images;
use BeetleCore\Fields\Textbox;
use BeetleCore\Validator\NoEmpty;
use BeetleCore\Validator\Unique;
use App\sliderItems;

class Slider extends Admin
{
    protected $table = "slider";
    public $modelName = "Слайдер";
    public $modelDescription = "";
    public $positionKey = "position";
    public $nameKey = "name";
    protected $fields = [
        "name" => [
            "name" => "Название",
            "type" => Textbox::class,
        ],
        "img" => [
            "name" => "Изображение (1140*530 пикселей)",
            "type" => Images::class,
            "width" => 1140,
            "height" => 530
        ],
    ];
	public function image()
	{
		$image = json_decode($this->img, true);
		if (!empty($image)) {
			return $image[0]["img"];
		} else {
			return "/i/no_image.png";
		}
	}

}
