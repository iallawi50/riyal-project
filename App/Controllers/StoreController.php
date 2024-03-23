<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Store;
use App\Models\User;

class StoreController extends Controller
{

    public function __construct()
    {
        return $this->middleware("auth");
    }

    public function index()
    {
        return view("store/orders");
    }

    public function create()
    {
        return view("store/create");
    }

    public function store()
    {
        $name = Request::get("name");
        $link = Request::get("link");
        $user = user()->id;

        if (!user()->store()) {
            Store::create([
                "name" => $name,
                "link" => $link,
                "user_id" => $user
            ]);
        }
        redirect_home();
    }

    public function credit()
    {
        return view("store/credit");
    }
}
