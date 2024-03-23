<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Models\User;
use App\QueryBuilder;
use Carbon\Carbon;

class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except("create");
    }

    public function index()
    {
        return view("invoice/index", [
            "invoices" => user()->invoices()
        ]);
    }


    public function create()
    {
        $stores = QueryBuilder::select("users", ["is_store", "=", 1], class: User::class);
        return view("invoice/create", ["stores" => $stores]);
    }

    public function store()
    {
        $invoice = Request::get("invoice");
        $sellerID = Request::get("store");
        $product = Request::get("product");
        $price = Request::get("price");
        $mobile = Request::get("mobile");

        Invoice::create([
            "invoice_number" => $invoice,
            "product_name" => $product,
            "seller_id" => $sellerID,
            "product_price" => $price,
            "buyer_id" => $mobile,
            "status" => 0,
        ]);


        return view("invoice/sent", [
            "invoice" => $invoice
        ]);
    }


    public function checkout()
    {
        return view("invoice/checkout");
    }


    public function completed()
    {
        $id = Request::get("id");
        $invoice = Invoice::find(Request::get("id"));
        Invoice::update($id, [
            "status" => 1
        ]);

        Transaction::create([
            "seller_id" => $invoice->seller()->id,
            "buyer_id" => user()->id,
            "invoice_number" => $invoice->invoice_number,
            "amount" => $invoice->product_price,
            "status" => 0,
            "bill_id" => $invoice->id,
            "created_at" => Carbon::now()
        ]);



        return redirect("invoices");
    }


    public function cancel()
    {
        Invoice::update(Request::get("id"), [
            "status" => 2
        ]);

        return redirect("invoices");
    }
}
