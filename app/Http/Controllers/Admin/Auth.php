<?php


namespace App\Http\Controllers\Admin;


class Auth
{
    public function exit() {
        request()->session()->flush();
        return redirect()->route("admin.index");
    }
}
