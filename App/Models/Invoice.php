<?php


namespace App\Models;

use Model;

class Invoice extends Model
{

    public $id;

    public static $table = "invoice";

    public function seller()
    {
        return $this->belongsTo(User::class, "seller_id");
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, "buyer_id");
    }
}
