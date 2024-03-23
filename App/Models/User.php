<?php

namespace App\Models;

use App\QueryBuilder;
use Model;

class User extends Model
{

    public $id;
    public $name;
    public $mobile;
    public $password;
    public $is_store;
    private $credit;
    private $suspended;

    public function store()
    {
        return $this->hasMany(Store::class, "user_id");
    }

    public function invoices()
    {
        return QueryBuilder::select("invoice", ["buyer_id", "=", $this->mobile], class: Invoice::class);
    }

    public function orders()
    {
        return $this->hasMany(Transaction::class, "buyer_id");
    }

    public function store_orders()
    {
        return $this->hasMany(Transaction::class, "seller_id");
    }


    public function credit()
    {

        foreach ($this->store_orders() as $order) {
            if ($order->status == 1) {
                $this->credit += $order->amount;
            } else if($order->status == 0)
            {
                $this->suspended += $order->amount;
            } else continue;
        }

        return [$this->credit, $this->suspended];
    }
}
