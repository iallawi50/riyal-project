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

    public function store()
    {
        return $this->hasMany(Store::class, "user_id");
    }

    public function invoices()
    {
        return QueryBuilder::select("invoice", ["buyer_id", "=", $this->mobile], class: Invoice::class);
    }
}
