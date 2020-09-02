<?php


namespace App\Http\Controllers\Admin;


use App\Beetle\FileArray;
use App\Beetle\Form;
use Illuminate\Http\Request;

class Settings extends \BeetleCore\Controllers\Settings
{
	protected $model = \App\Admin\Settings::class;

}
