<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Feedback;
use PHPMailer\PHPMailer\PHPMailer;

class User extends Admin
{
    protected $modelName = \App\Admin\User::class;

    protected function addEditBeforeSave($parent, $id, $record, $add)
    {
        $activeBefore = $record->user_active ?? "N";
        $activeNow = request("user_active", "N");

        if ($activeBefore == "N" and $activeNow == "Y") {
            $site = $_SERVER["HTTP_HOST"];
            $body = view("user_reg_active_mail", compact("site", "record"))->render();
            $mail = new PHPMailer(true);
            $mail->CharSet = 'UTF-8';
            $mail->setFrom("info@$site");
            $mail->addAddress(request("user_email"));
            $mail->isHTML(true);
            $mail->Subject = "Регистрация на сайте $site";
            $mail->Body = $body;
            $mail->AltBody = Feedback::strip_html_tags($body);
            $mail->send();
        }
    }

}
