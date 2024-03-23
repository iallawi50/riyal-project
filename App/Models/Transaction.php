<?php


namespace App\Models;

use App\QueryBuilder;
use Model;

class Transaction extends Model
{

    

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, "bill_id");
    }

    public function reason()
    {
        return QueryBuilder::select("cancelationreason", ["transaction_id", "=", $this->id], true);
    }
}
