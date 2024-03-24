<?php

use App\App;
use App\Middleware\Auth;
use App\Models\Transaction;
use Carbon\Carbon;

function app_name($default = "riyal")
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




function checkAndUpdateInvoiceStatus($id, $invoiceDate, $status)
{
    // تحديد تاريخ اليوم وتحديد تاريخ قبل أسبوعين
    $today = Carbon::now();
    $twoWeeksAgo = $today->copy()->subWeeks(2);

    // تحويل تاريخ الفاتورة إلى كائن Carbon
    $invoiceDate = Carbon::parse($invoiceDate);

    // التحقق مما إذا كان قد مرت أسبوعين
    if ($invoiceDate->lessThanOrEqualTo($twoWeeksAgo)) {
        // التحقق من أن الحالة الحالية للفاتورة هي 0
        if ($status == 0) {
            // تحديث حالة الفاتورة إلى 1
            Transaction::update($id, [
                "status" => 1,
                "created_at" => $invoiceDate
            ]);
            return false; // تم تحديث حالة الفاتورة
        }
        return false;
    }

    return true; // لم يتم تحديث حالة الفاتورة
}
