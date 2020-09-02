<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class Back
{
    public function __invoke(Request $request, $count)
    {
        return view("admin.back", compact("count"));
    }
}
