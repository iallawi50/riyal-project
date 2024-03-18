<?php


namespace App\Models;

use Model;

class Transaction extends Model {


    public function seller_id()
    {
        return $this->belongsTo(User::class, 'saller_id');
    }

    public function buyer_id()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }


} 