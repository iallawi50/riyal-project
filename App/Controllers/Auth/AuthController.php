<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\User;


class AuthController extends Controller
{

    public function __construct()
    {
        return $this->middleware("guest");
    }


    public function register()
    {
        return view("auth/register");
    }

    public function store()
    {

        $name = trim(Request::get("name"));
        $mobile = trim(Request::get("mobile"));
        $password = Request::get("password");
        $confirmpassword = Request::get("confirmpassword");
        $send = true;
        $data = [
            "name" => $name,
            "mobile" => $mobile,
            "errors" => [],
        ];

        // Name Validate
        if (empty($name)) {
            $data["errors"]["name"] = 'حقل الاسم فارغ';
            $send = false;
        }

        // mobile Validate
        if (empty($mobile)) {
            $data["errors"]["mobile"] = 'حقل اسم المستخدم فارغ';
            $send = false;
        } else if (str_contains($mobile, " ") || preg_match('/^\d{11}$/', $mobile)) {
            $data["errors"]["mobile"] = 'يجب ان لايحتوي على مسافات او رموز';
            $send = false;
        } else if (User::find($mobile, "mobile")) {
            $data["errors"]["mobile"] = 'اسم المستخدم موجود بالفعل';
            $send = false;
        }


        // Password Validate

        if (empty($password)) {
            $data["errors"]["password"] = 'حقل كلمة المرور فارغ';
            $send = false;
        } else if (strlen($password) < 8) {
            $data["errors"]["password"] = 'كلمة المرور قصيرة , يجب ان تكون 8 او اطول';
            $send = false;
        } else if ($password != $confirmpassword) {
            $data["errors"]["password"] = 'كلمة المرور وتأكيد كلمة المرور غير متطابقين';
            $send = false;
        }

        if ($send) {
            User::create([
                "name" => $name,
                "mobile" => $mobile,
                "password" => $password,
            ]);

            $user = User::find($mobile, "mobile");
            $_SESSION['user'] = $user;

            return redirect_home();
        }


        return view("auth/register", $data);
    }

    public function login()
    {
        return view("auth/login");
    }

    public function authentication()
    {



        $mobile = Request::get("mobile");
        $password = Request::get("password");
        $user = User::find($mobile, "mobile", "=");
        $data = [
            "mobile" => $mobile,
        ];

        if (!empty($mobile) && !empty($password)) {
            if ($user) {

                if ($user->mobile == $mobile && $user->password == $password) {
                    $_SESSION["user"] = $user;
                    return redirect_home();
                } else {
                    $data["errors"] = "البيانات المدخلة غير متطابقة مع سجلاتنا";
                }
            } else {
                $data["errors"] = "البيانات المدخلة غير متطابقة مع سجلاتنا";
            }
        } else {
            $data["errors"] = "لديك حقول فارغة";
        }


        return view("auth/login", $data);
    }


    public function logout()
    {
        unset($_SESSION["user"]);
        return back();
    }
}
