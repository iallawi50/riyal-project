<?php


namespace App\Models;

use Model;

class Invoice extends Model {


    public static $table = "invoice";

    public function saller()
    {
        return $this->belongsTo(User::class, "saller_id");
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, "buyer_id");
    }
} 