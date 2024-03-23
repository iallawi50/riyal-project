<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Transaction;
use App\QueryBuilder;
use Carbon\Carbon;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view("orders/index");
    }



    public function completed()
    {
        $id = Request::get("id");
        $transaction = Transaction::find(Request::get("id"));
        Transaction::update($id, [
            "status" => 1,
            "created_at" => Carbon::parse($transaction->created_at)
        ]);




        return redirect("orders");
    }


    public function cancel()
    {
        $order = Transaction::find(Request::get("id"));

        if (checkAndUpdateInvoiceStatus($order->id, $order->created_at, $order->status)) {
            return view("orders/cancel");
        }
        return redirect_home();
    }

    public function cancelation()
    {
        $id = Request::get("id");
        $reason = Request::get("reason");

        Transaction::update($id, [
            "status" => 2
        ]);


        QueryBuilder::insert("cancelationreason", [
            "reason" => $reason,
            "transaction_id" => $id,
            "created_at" => Carbon::now()
        ]);


        return redirect("orders");
    }
}
