<?php

require "./__init.php";

use App\Core\Route;
use App\Core\Request;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Controllers\TransactionController;


Route::make()
    ->get("", [HomeController::class, "index"])
    // Authentication
    ->get("register", [AuthController::class, "register"], "guest")
    ->post("register", [AuthController::class, "store"], "guest")
    ->get("login", [AuthController::class, "login"], "guest")
    ->post("login", [AuthController::class, "authentication"], "guest")
    ->post("logout", [AuthController::class, "logout"], "auth")
    ->get("transaction/create", [InvoiceController::class, "create"])


    ->resolve(Request::uri(), Request::method());
