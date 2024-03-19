<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Invoice;
use App\Models\User;
use App\QueryBuilder;

class InvoiceController extends Controller
{

    public function index()
    {
        return view("invoice/index");
    }


    public function create()
    {
        $stores = QueryBuilder::select("users", ["is_store", "=", 1], class: User::class);
        return view("invoice/create", ["stores" => $stores]);
    }

    public function store()
    {
        $invoice = Request::get("invoice");
        $sallerID = Request::get("store");
        $product = Request::get("product");
        $price = Request::get("price");
        $mobile = Request::get("mobile");

        Invoice::create()
    }
}
