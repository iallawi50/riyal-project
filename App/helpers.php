<?php

use App\App;
use App\Middleware\Auth;


function app_name($default = "Marten")
{
    return App::$entries["config"]["app"]["name"] ?? $default;
}
function home()
{
    return $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/" . App::$entries["config"]["app"]["url"];
}

function asset($path = null)
{
 
    return $path ? home() . "/public/" . $path : home() . "/public/";
}

function view($VIEW_NAME, $data = null)
{
    if ($data) {
        extract($data);
    }
    require "./views/$VIEW_NAME.view.php";
}

function component($COMPONENT_NAME, $data = null)
{
    if ($data) {
        extract($data);
    }
    require "./views/components/$COMPONENT_NAME.component.php";
}

function redirect($to)
{
    header("Location: " . home() . "/" . $to);
}

function redirect_home()
{
    redirect("");
}

function back()
{
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}


function notfound()
{
    redirect(home() . "/404.php");
}


function notauthorized($msg = "غير مصرح")
{
    $_SESSION["not-authorized"] = $msg;
    return redirect_home();
}


function user()
{
    return Auth::user();
}
