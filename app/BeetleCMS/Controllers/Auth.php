<?php


namespace App\BeetleCMS\Controllers;


class Auth
{
    public function exit() {
        request()->session()->flush();
        return redirect()->route("admin.index");
    }
}
